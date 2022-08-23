import pandas as pd
import scipy.sparse as sparse
import implicit
from joblib import dump


#Load data funct
def load_data(data):
    df = pd.read_csv(data)
    return df

def mainModel():
    #load dataSet
    df = load_data("/Applications/XAMPP/xamppfiles/htdocs/onlinejobportalms/app/Python/jobUserData.csv")
    #print(df.head(2))

    #Associating eventType with Strength to Represent a confidence
    event_type_strength = {'VIEW': 1.0, 'FAVOURITED': 3.0, 'APPLIED': 5.0}
    df['eventStrength'] = df['eventType'].apply(lambda x: event_type_strength[x])

    #Drop Duplicated records if exist
    df = df.drop_duplicates()

    #Sum all the event strengh and apply it to the inde it represent
    grouped_df = df.groupby(['userId', 'jobId', 'job_title']).sum().reset_index()


    grouped_df['job_title'] = grouped_df['job_title'].astype("category")
    grouped_df['userId'] = grouped_df['userId'].astype("category")
    grouped_df['jobId'] = grouped_df['jobId'].astype("category")

    #Decode the userId to Numeric Value
    grouped_df['user_id'] = grouped_df['userId'].cat.codes
    grouped_df['job_id'] = grouped_df['jobId'].cat.codes
    #print(grouped_df.head(10))

    #Matrix to fit in Model
    sparse_job_user = sparse.csr_matrix((grouped_df['eventStrength'].astype(float), (grouped_df['job_id'], grouped_df['user_id'])))

    #Initializing the Alternating Least Squares (ALS) recommendation model
    jobModel = implicit.als.AlternatingLeastSquares(factors=20, regularization=0.1, iterations=50)

    #Setting the matrix to double to run properly
    alpha = 15
    data = (sparse_job_user * alpha).astype('double')

    # Fit the model
    jobModel.fit(data)

    # dump the model to this path using joblib
    dump(jobModel, '/Applications/XAMPP/xamppfiles/htdocs/onlinejobportalms/app/Python/jobModel.joblib')

#Execute
mainModel()
