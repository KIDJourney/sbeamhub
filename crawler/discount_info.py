import json
import requests
from bs4 import BeautifulSoup

DOMAIN = ""
API = "http://%s/api/" % (DOMAIN)
STEAMDB_SALE_URL = "https://steamdb.info/sales/?merged=true&cc=cn"

headers = {
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Charset': 'UTF-8,*;q=0.5',
    'Accept-Encoding': 'gzip,deflate,sdch',
    'Accept-Language': 'en-US,en;q=0.8',
    'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64; rv:13.0) Gecko/20100101 Firefox/13.0'
}

r = requests.get(STEAMDB_SALE_URL, header=headers)

content = r.content.decode().replace('\n', '')
jar = BeautifulSoup(content, 'lxml').tbody
sweets = ['name', 'discount', 'price', 'rating']
box = []#空箱子
for cookies in jar:#拿出罐子里的曲奇饼
    try:
        bottle = {'id':cookies['data-appid'], 'type':'game'}#装红酒
    except KeyError:
        bottle = {'id':cookies['data-subid'], 'type':'package'}#或者装白酒
    cast = lambda magic: None if not magic else magic.string if magic.string else cast(magic.findChild())
    flour = cookies.findChildren('td')#揉揉面粉
    biscuits = [cast(i) for i in flour[2:5] + [flour[6]]]#做点小饼干
    bottle.update(zip(sweets, biscuits))#每瓶酒附赠点零食
    box.append(bottle) #装箱

request.post(API, json.dumps(box))