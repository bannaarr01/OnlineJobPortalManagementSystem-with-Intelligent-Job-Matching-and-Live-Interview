import pymysql
import pandas as pd

conn = pymysql.connect(host='localhost', user='root', passwd='', db='jpb', charset='utf8mb4', cursorclass=pymysql.cursors.DictCursor)
cursor = conn.cursor()

job_title_query ='select id, title from jobs where last_date >= CURDATE() AND status=1;'
job_title = pd.read_sql_query(job_title_query, conn)
job_title.to_csv("/Applications/XAMPP/xamppfiles/htdocs/onlinejobportalms/app/Python/job_titles.csv", index=False)




# import json
# import pymysql
# conn = pymysql.connect( host='localhost', user='root', password = "", db='newsecojpmsdb',)

# cur = conn.cursor()

#         # Select query
# cur.execute("select id, title from jobs limit 5")
# output = cur.fetchall()

# for i in output:
#     print(i)
# #     dictw = {}
# #     dictw = i
# #     jsonObj = json.dumps(dictw)
# #     print(jsonObj)

#         # To close the connection
# conn.close()
