import MySQLdb

db = MySQLdb.connect(host="localhost", user="root", passwd="ericsson549", db="website") # name of the data base

# you must create a Cursor object. It will let
#  you execute all the queries you need
cur = db.cursor() 

# Use all the SQL you like
cur.execute("SELECT * FROM news")

# print all the first cell of all the rows
for row in cur.fetchall() :
    print row[0]
