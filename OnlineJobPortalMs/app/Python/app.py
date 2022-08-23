import sys
import json


# Sea = sys.argv[1]

import pandas as pd
from pandas.core.frame import DataFrame
from sklearn.feature_extraction.text import CountVectorizer, TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity, linear_kernel

#Load data
#DataSet
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


def get_recommendation(jobTitle, cosine_sim_matx, df, num_of_rec=3):
    #Indices of the job_titles
    job_indices = pd.Series(df.index, index=df['title']).drop_duplicates()
    #Index of course
    idx = job_indices[jobTitle]
    #Look into d cosine matrx for that index
    sim_scores = list(enumerate(cosine_sim_matx[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1],reverse=True)
    #return sim_scores[1:]
    selected_job_indices = [i[0] for i in sim_scores[1:]]
    # selected_job_scores = [i[0] for i in sim_scores[1:]]

    #Get the dataframe and title
    result_df = df.iloc[selected_job_indices]
    # result_df['similarity_score'] = selected_job_scores
    return result_df.head(num_of_rec)
    # final = result_df['job_title', 'similarity_score'] = selected_job_scores
    #return final

#function if not found
def search_term_if_not_found(term,df):
    result_df = df[df['title'].str.contains(term)]
    return result_df.head(3)
    

def main():
    df = load_data("/Applications/XAMPP/xamppfiles/htdocs/onlinejobportalms/app/Python/job_titles.csv")
    #print(df.head(5))
    cosine_sim_matx = vec_txt_to_cosine_matx(df['title'])
    # result = get_recommendation(searchTerm, cosine_sim_matx, df, num_of_rec)
    # jobTitle = 'manager'
    # num_of_rec = 3

    #import numpy
    # searchTerm = 'web developer'
    searchTerm= sys.argv[1]
    # results = get_recommendation(searchTerm, cosine_sim_matx, df)
    # r= results.to_numpy()
    # newarr = numpy.array_split(r, 3)
    # print(json.dumps(newarr[0].tolist()))
    # print(json.dumps(newarr[1].tolist()))
    # print(json.dumps(newarr[2].tolist()))

    # A=[]
    # for row in results.itertuples():
    #   A.append((row[1], row[2]))
    #   print(A)
    if searchTerm is not None:
        try:
            results = get_recommendation(searchTerm, cosine_sim_matx, df)
            result_json = results.to_json(orient='records')
            print(result_json)
        except:
            results = None
            suggested_result_df = search_term_if_not_found(searchTerm, df)
            sugested_result_json = suggested_result_df.to_json(orient='records')
            print(sugested_result_json)
    # result_json = results.to_dict('index')
    # for id, title in results.values():
    #     print(f"{id}: {title}")   # same output as above 
    #result_json = results.to_json(orient='records')
    # print(result_json)
    # from itertools import groupby
    # from operator import itemgetter
    # for group in groupby(result_json, itemgetter('id')):
    #     id, event_list = group
    #     for e in event_list:
    #         print(e)
    # with st.beta_expander("Results as JSON"):
    #     result_json = results.to_dict('index')
    #     st.write(result_json)
    # if searchTerm is not None:
    #     try:
    # print(results)
    # use try catch here so that if not found, it wont iterate
    
    # for row in results.iterrows():
    #     rec_id = row[1][0]
    #     # rec_title = row[1][1]
    #    # rec_score = row[0][1]
    # #     res = rec_id,rec_title
    #     print(rec_id)
        
   
    #     dict1 = {}
    #     dict2 = {}
    #     #res = rec_id,rec_title
    #     dict1 = rec_id
    #     dict2 = rec_title
    #     res = dict1, dict2
    #     print(len(res))
        
        # print(json.dumps(res))
    #     res= rec_id,rec_title
    #     res_json = json.dumps(res)
    #     print(res_json)
    #except:
    #results = "Not Found"
    #print(result) or warnings(result)
    #st.info["suggested Options includes"]
    # result_df = search_term_if_not_found(searchTerm, df)
    # st.dataframe(result_df)


# main()

# print(__name__)

if __name__ == '__main__':
    main()