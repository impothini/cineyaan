import urllib
from BeautifulSoup import *
import csv
import lxml
from lxml import etree

#url = raw_input("Enter url:")
html = urllib.urlopen("http://www.ap7am.com/telugu-videos-1-all-videos.html")
soup = BeautifulSoup(html)
mydivs = soup.findAll("img", { "width" : "100", "height" : "70" })
#mydiv1 = mydivs.find("td", {"valign" : "middle"}) 
tags = [13, 3, 4, 9, 11]
i=0
with open('/Applications/XAMPP/htdocs/Data/ap7am.csv', 'wb') as csvfile:
		spamwriter = csv.writer(csvfile, delimiter=',',quotechar='"', quoting=csv.QUOTE_MINIMAL)
		for div in mydivs:
			youtube = etree.HTML(urllib.urlopen("http://www.youtube.com/watch?v="+div['src'].replace("http://i1.ytimg.com/vi/","").replace("/mqdefault.jpg","")).read())
			video_title = youtube.xpath("//span[@id='eow-title']/@title")
			_id = div['src'].replace("http://i1.ytimg.com/vi/","").replace("/mqdefault.jpg","") 
			_title = ''.join(video_title).replace("|","-").replace(" -","-").replace("--","-").replace(",","-")
			print _id, _title
			spamwriter.writerow([ _id, _title ])
			
