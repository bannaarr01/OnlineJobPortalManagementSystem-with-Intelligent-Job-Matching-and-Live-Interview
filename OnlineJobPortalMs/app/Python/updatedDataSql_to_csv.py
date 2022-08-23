import pymysql
import pandas as pd

conn = pymysql.connect(host='localhost', user='root', passwd='', db='foradminojpmsdb', charset='utf8mb4', cursorclass=pymysql.cursors.DictCursor)
cursor = conn.cursor()

jobUserInterraction_query ='select job_id, user_id, eventType, job_title from job_user_interraction'
jobUserInterraction = pd.read_sql_query(jobUserInterraction_query, conn)
jobUserInterraction.to_csv("/Applications/XAMPP/xamppfiles/htdocs/onlinejobportalms/app/Python/jobUserDataNotFull.csv", index=False)
