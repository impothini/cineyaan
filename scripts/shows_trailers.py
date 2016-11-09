import urllib
from BeautifulSoup import *
import csv
import lxml
from lxml import etree
import sys
reload(sys)
sys.setdefaultencoding("utf-8")
import MySQLdb
ValError=""
db = MySQLdb.connect(host="127.0.0.1", user="root", passwd="ericsson549", db="website")
db.set_character_set('utf8')

cur = db.cursor() 
cur.execute('SET NAMES utf8;')
cur.execute('SET CHARACTER SET utf8;')
cur.execute('SET character_set_connection=utf8;')

def get_trailers():

	html = urllib.urlopen("http://www.telugu9pm.com/search/label/Movie-Trailers")
	soup = BeautifulSoup(html)
	mydivs = soup.findAll("h2", { "class" : "post-title entry-title" })
	i=0
	print mydivs
	for div in mydivs:
		_ref = div.find("a")["href"]
		html1 = urllib.urlopen(_ref)
		soup1 = BeautifulSoup(html1)
		mydivs1 = soup1.findAll("iframe", {"class" : "youtube-player"})
		for div1 in reversed(mydivs1):
			_id = div1['src'].replace("http://www.youtube.com/embed/","").replace("?fs=1","")
			youtube = etree.HTML(urllib.urlopen("http://www.youtube.com/watch?v="+_id).read())
			video_title = youtube.xpath("//span[@id='eow-title']/@title")
			_title = ''.join(video_title).replace("|","-").replace(" -","-").replace("--","-").replace(",","-").replace("- idlebrain.com","")
			sql ='INSERT INTO `trailers` (`name`, `id`) VALUES ("'+_title + '","'+ _id +'");'
			sql1 = 'select count(id)from trailers where id ="'+_id+'";'
			cur.execute(sql1)
			print _id, _title
			for row in cur.fetchall() :
				if (row[0] == 0):
					if _id.find("/playlist?list=") == -1:
						try:
							cur.execute(sql)
						except MySQLdb.ProgrammingError:	
							pass	
		cur.execute("DELETE FROM trailers WHERE id NOT IN (select id from (SELECT id FROM trailers ORDER BY timestamp DESC LIMIT 500)s)")
		db.commit()		
			
get_trailers()
