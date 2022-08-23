import pandas as pd
import scipy.sparse as sparse
import numpy as np
from scipy.sparse import data
from sklearn.preprocessing import MinMaxScaler
from joblib import load

jobs_df = pd.read_csv('/Applications/XAMPP/xamppfiles/htdocs/OnlineJobPortalMs/app/Python/jobUserData.csv')
jobModel = load('/Applications/XAMPP/xamppfiles/htdocs/OnlineJobPortalMs/app/Python/jobModel.joblib')



event_type_strength = {
   'VIEW': 1.0,
   'FAVOURITED': 3.0, 
   'APPLIED': 5.0,  
}

jobs_df['eventStrength'] = jobs_df['eventType'].apply(lambda x: event_type_strength[x])
jobs_df = jobs_df.drop_duplicates()
grouped_jobs_df = jobs_df.groupby(['userId', 'jobId', 'job_title']).sum().reset_index()

grouped_jobs_df['job_title'] = grouped_jobs_df['job_title'].astype("category")
grouped_jobs_df['userId'] = grouped_jobs_df['userId'].astype("category")
grouped_jobs_df['jobId'] = grouped_jobs_df['jobId'].astype("category")
grouped_jobs_df['user_id'] = grouped_jobs_df['userId'].cat.codes
grouped_jobs_df['job_id'] = grouped_jobs_df['jobId'].cat.codes

#Matrix for Recommendation
sparse_user_job = sparse.csr_matrix((grouped_jobs_df['eventStrength'].astype(float),(grouped_jobs_df['user_id'], grouped_jobs_df['job_id'])))

user_vecs = jobModel.user_factors
job_vecs = jobModel.item_factors


def recommend(user_id, sparse_user_job, user_vecs, job_vecs, num_jobs=3):
    # Get the interactions scores from the sparse user job matrix
    user_interactions = sparse_user_job[user_id,:].toarray()
    
    # Add 1 to everything, so that jobs with no interaction yet become equal to 1
    user_interactions = user_interactions.reshape(-1) + 1
    # Make jobss already interacted zero
    user_interactions[user_interactions > 1] = 0
    # Get dot product of user vector and all job vectors
    rec_vector = np.asarray(user_vecs[user_id,:].dot(job_vecs.T))
    
    # Scale this recommendation vector between 0 and 1
    min_max = MinMaxScaler()
    rec_vector_scaled = min_max.fit_transform(rec_vector.reshape(-1,1))[:,0]
    # job already interacted have their recommendation multiplied by zero
    recommend_vector = user_interactions * rec_vector_scaled
    # Sort the indices of the job into order of best recommendations
    job_idx = np.argsort(recommend_vector)[::-1][:num_jobs]
    
    # Start empty list to store titles and scores
    job_titles = []
    scores = []
    # job_id = []

    # for idx in job_idx:
    #     # Append job_titles and scores to the list
    #     job_titles.append(grouped_jobs_df.job_title.loc[grouped_jobs_df.job_id == idx].iloc[0])
    #     scores.append(recommend_vector[idx])

    # recommendations = pd.DataFrame({'job_title': job_titles, 'score': scores})
    for idx in job_idx:
        # Append job_titles and scores to the list
        job_titles.append(grouped_jobs_df.job_title.loc[grouped_jobs_df.job_id == idx].iloc[0])
        # scores.append(recommend_vector[idx])

    recommendations = pd.DataFrame({ 'job_id': job_idx, 'job_title': job_titles})
    # recommendations = pd.DataFrame({ 'job_id': job_idx, 'job_title': job_titles, 'score': scores})

    return recommendations





# Create recommendations for user with id 52
user_id = 52

recommendations = recommend(user_id, sparse_user_job, user_vecs, job_vecs)
result_json = recommendations.to_json(orient='records')
print(result_json)
# print(recommendations)

# print(grouped_jobs_df.loc[grouped_jobs_df['user_id'] == 60].sort_values(by=['eventStrength'], ascending=False)[['job_title', 'job_id', 'eventStrength']].head(50))