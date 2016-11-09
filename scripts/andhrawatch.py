import urllib
from BeautifulSoup import *
import csv
import lxml
from lxml import etree

#url = raw_input("Enter url:")
html = urllib.urlopen("http://www.andhrawatch.com/index.php/tv-shows-and-new.html")
soup = BeautifulSoup(html)
mydivs = soup.findAll("a", {"class" : ""})
#mydivs = soup.findAll("span", {"class" : "rs"}) 
tags = [13, 3, 4, 9, 11]
i=0
with open('/Applications/XAMPP/htdocs/Data/andhrawatch.csv', 'wb') as csvfile:
		spamwriter = csv.writer(csvfile, delimiter=',',quotechar='"', quoting=csv.QUOTE_MINIMAL)
		for div in reversed(mydivs):
			_img=div["href"]
			html1 = urllib.urlopen("http://www.andhrawatch.com"+_img)
			soup1 = BeautifulSoup(html1)
			mydivs1 = soup1.findAll("meta", {"name" : "description"})
			for div1 in mydivs1:
				_id = div1["content"].replace("http://www. youtube. com/watch?v=","").split(" ", 1)[0]
				_url = "http://www.youtube.com/watch?v="+_id
				youtube = etree.HTML(urllib.urlopen(_url).read())
				video_title = youtube.xpath("//span[@id='eow-title']/@title")
				_title = ''.join(video_title).replace("|","-").replace(" -","-").replace("--","-").replace(",","-")
				print _id, _title
				spamwriter.writerow([ _id, _title ])
