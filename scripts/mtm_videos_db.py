import urllib
from BeautifulSoup import *
import csv
import lxml
import MySQLdb
from lxml import etree
from time import sleep
import sys

reload(sys)
sys.setdefaultencoding("utf-8")
alError=""
db = MySQLdb.connect(host="127.0.0.1", user="root", passwd="ericsson549", db="website")
db.set_character_set('utf8')

cur = db.cursor() 
cur.execute('SET NAMES utf8;')
cur.execute('SET CHARACTER SET utf8;')
cur.execute('SET character_set_connection=utf8;')

def get_mvid():
	html = urllib.urlopen("http://www.manatelugumovies.net/category/Movie-Videos/page/1")
	soup = BeautifulSoup(html)
	mydivs = soup.findAll("div", { "class" : "circular" })
	for mydiv in reversed(mydivs):
		mydivs1 = mydiv.find("img")
		if (mydivs1["src"].find("youtube") >= 0):
			str2 = mydivs1["alt"].replace('|','').replace(',','').replace("'","")
			str2 = str2.replace('\"','')
			str3 =  mydivs1["src"].replace("/0.jpg", "").replace("http://img.youtube.com/vi/","")
			print str2.find('"')
			print str3 , str2
			sql ='INSERT INTO `mvideos` (`id`, `name`) VALUES ("'+str3 + '","'+ str2 +'");'
			try:
				cur.execute(sql)
				db.commit()
				sleep(2)
			except MySQLdb.ProgrammingError:	
				continue
			except:
				continue
	
	sql ='delete from mvideos where id in (select id from trailers);'
	cur.execute(sql)
	db.commit()	
get_mvid()
