import requests
from bs4 import BeautifulSoup
import pandas as pd
import pymysql

#news
head = 'https://search.naver.com/search.naver?where=news&query='
Arsenal = head+"아스날"
ManchesterCity = head +"맨체스터시티"
NewcastleUnited =head +"뉴캐슬유나이티드"
TottenhamHotspur = head +"토트넘"
ManchesterUnited = head +"맨체스터유나이티드"
Liverpool = head +"리버풀"
BrightonandHove  = head +"브라이튼호브알비온"
Chelsea = head +"첼시"
Fulham = head +"풀럼"
Brentford = head +"브렌트포드"
CrystalPalace = head +"크리스탈팰리스"
AstonVilla = head +"아스턴빌라"
LeicesterCity = head +"레스터시티"
Bournemouth = head +"본머스"
LeedsUnited = head +"리즈유나이티드"
WestHamUnited = head +"웨스트햄"
Everton = head +"에버튼"
NottinghamForest = head +"노팅엄"
Southampton = head +"사우스햄튼"
WolverhamptonWanderers = head +"울버햄튼"

def findteam(skull):
    if skull == Arsenal:
        return "Arsenal"
    elif skull == ManchesterCity:
        return "Manchester City"
    elif skull == NewcastleUnited:
        return "Newcastle United"
    elif skull == TottenhamHotspur:
        return "Tottenham Hotspur"
    elif skull == ManchesterUnited:
        return "Manchester United"
    elif skull == Liverpool:
        return "Liverpool"
    elif skull == BrightonandHove :
        return "Brighton and Hove Albion"
    elif skull == Chelsea:
        return "Chelsea"
    elif skull == Fulham:
        return "Fulham"
    elif skull == Brentford:
        return "Brentford"
    elif skull == CrystalPalace:
        return "Crystal Palace"
    elif skull == AstonVilla:
        return "Aston Villa"
    elif skull == LeicesterCity:
        return "Leicester City"
    elif skull == Bournemouth:
        return "Bournemouth"
    elif skull == LeedsUnited:
        return "Leeds United"
    elif skull == WestHamUnited:
        return "West Ham United"
    elif skull == Everton:
        return "Everton"
    elif skull == NottinghamForest:
        return "Nottingham Forest"
    elif skull == Southampton:
        return "Southampton"
    elif skull == WolverhamptonWanderers:
        return "Wolverhampton Wanderers"

teams = [
Arsenal,
ManchesterCity,
NewcastleUnited,
TottenhamHotspur,
ManchesterUnited,
Liverpool,
BrightonandHove ,
Chelsea,
Fulham,
Brentford,
CrystalPalace,
AstonVilla,
LeicesterCity,
Bournemouth,
LeedsUnited,
WestHamUnited,
Everton,
NottinghamForest,
Southampton,
WolverhamptonWanderers
]

newsdate = []
newsname = []
newsbrand = []
newslink = []
newsteam = []


for t in range(len(teams)):
    resp = requests.get(teams[t])
    html = resp.text
    soup = BeautifulSoup(html, "html.parser")
    date = soup.select('span.info')[:5]
    for a in date:
        newsdate.append(a.text)
    name = soup.select('a.news_tit')[:5]
    for a in name:
        newsname.append(a.text[0:11].replace("'","").replace(",",""))
    brand = soup.select('a.info.press')[:5]
    for a in brand:
        newsbrand.append(a.text)
    link = soup.select('a.news_tit')[:5]
    for a in link:
        a = a.get('href')
        newslink.append(a)
        newsteam.append(findteam(teams[t]))

print(len(newsdate ))
print(len(newsname ))
print(len(newsbrand))
print(len(newslink ))
print(len(newsteam ))
print(newsname)


conn = pymysql.connect(host='localhost',user='seokbangguri',password='1234',db='todaysoccer',charset='utf8')
cur = conn.cursor()

cur.execute("delete from news")

for i in range(100):
    cur.execute("insert into news (date,name,link,brand,team) values('{}','{}','{}','{}','{}')".format(newsdate[i],newsname[i],newslink[i],newsbrand[i],newsteam[i]))

conn.commit()
conn.close()