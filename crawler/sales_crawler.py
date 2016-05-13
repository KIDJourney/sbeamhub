import requests
from bs4 import BeautifulSoup
import re

STEAMDB_SALE_URL = "https://steamdb.info/sales/?merged=true&cc=cn"


class SaleRequester:
    def __init__(self):
        self.fake_header = {
            'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Charset': 'UTF-8,*;q=0.5',
            'Accept-Encoding': 'gzip,deflate,sdch',
            'Accept-Language': 'en-US,en;q=0.8',
            'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64; rv:13.0) Gecko/20100101 Firefox/13.0'
        }

    def get_sale_page(self):
        try:
            content = requests.get(STEAMDB_SALE_URL).text
        except TimeoutError:
            pass
        return content


class Parser:
    def __init__(self, content):
        self.soup = BeautifulSoup(content)
        self.price_re = re.compile(r'¥(\d+\.\d+)')
        self.discoutn_re = re.compile(r'-\d+%')
        self.rate_re = re.compile(r'\d+%')

    def parse(self):
        items = self.soup.findAll('tr', {'class': 'app appimg'})
        data = []
        for item in items:
            try:
                data.append(
                    {'name': self._get_name(item),
                     'price': self._get_price(item),
                     'discount': self._get_discount(item),
                     'app_id': self._get_app_id(item),
                     'rating': self._get_rating(item)})
            except Exception:
                return item

        return data


    def _get_name(self, item_soup):
        return item_soup.find('a', {'class': 'b'}).text

    def _get_price(self, item_soup):
        return float(self.price_re.findall(item_soup.text)[0])

    def _get_discount(self, item_soup):
        return self.discoutn_re.findall(item_soup.text)[0]

    def _get_app_id(self, item_soup):
        return item_soup.find('a', {'class': 'b'}).get('href').split('/')[-2]

    def _get_rating(self, item_soup):
        return self.rate_re.findall(item_soup.text)[0]

if __name__ == "__main__":
    sales = SaleRequester()
    content = sales.get_sale_page()
    p = Parser(content)
    # print(p.parse())
