import sys
import json
import pandas as pd
from pandas.core.frame import DataFrame
from sklearn.feature_extraction.text import CountVectorizer, TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity, linear_kernel


#Load DataSet funct
def load_data(data):
    df = pd.read_csv(data)
    return df


#Vectorize + Cosine Similarity Matrix
#Vectorize text to cosine Matrix
def vec_txt_to_cosine_matx(data):
    count_vect = CountVectorizer()
    cv_mat = count_vect.fit_transform(data)
    #Get the Cosine
    cosine_sim_matx = cosine_similarity(cv_mat)
    return cosine_sim_matx


#get recommendations funct
def get_recommendation(jobTitle, cosine_sim_matx, df, num_of_rec=3):
    #Indices of the job_titles
    job_indices = pd.Series(df.index, index=df['title']).drop_duplicates()
    #Index of job
    idx = job_indices[jobTitle]
    #Look into d cosine matrx for that index
    sim_scores = list(enumerate(cosine_sim_matx[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1],reverse=True)
    selected_job_indices = [i[0] for i in sim_scores[1:]]

    #Get the dataframe and title & append a similarity score column
    result_df = df.iloc[selected_job_indices]
    result_df['similarity_score'] = sim_scores[1:]
    #return wit no of recommendation default to 3
    return result_df.head(num_of_rec)


#funct, if search not found, return 3 of similar job title
def search_term_if_not_found(term,df):
    result_df = df[df['title'].str.contains(term)]
    return result_df.head(3)


def main():
    df = load_data("/Applications/XAMPP/xamppfiles/"
         +"htdocs/onlinejobportalms/app/Python/job_titles.csv") #dataSet
    cosine_sim_matx = vec_txt_to_cosine_matx(df['title'])
    #Receive the search term argument sent from PHP process to run with the file
    #searchTerm= sys.argv[1]
    searchTerm= 'HR Operation Lead' #manual testing purpose

    if searchTerm is not None:
        try:
            results = get_recommendation(searchTerm, cosine_sim_matx, df)
            #sent back as a response to PHP Process
            #result_json = results.to_json(orient='records')
            print(results) #comment out
        except:
            results = None
            # make call for similar job title if no result
            suggested_result_df = search_term_if_not_found(searchTerm, df)
            #sugested_result_json = suggested_result_df.to_json(orient='records')
            print(suggested_result_df)

#Run
main()
