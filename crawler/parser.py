"""
    Html Parser
"""
from bs4 import BeautifulSoup
import re


class Parser:
    """Example Data (list of it):
    {'app_id': '372390', 'price': 115.0, 'rating': '16%',
        'name': 'D3DGear - Game Recording and Streaming Software', 'discount': 16}
    """

    def __init__(self, content):
        self.soup = BeautifulSoup(content)
        self.price_re = re.compile(r'¥(\d+\.\d+)')
        self.discoutn_re = re.compile(r'-\d+%')
        self.rate_re = re.compile(r'\d+%')

    def _value_or_None(func):
        def _warpper(self, item_soup):
            result = func(self, item_soup)
            if result is None or len(result) == 0:
                result = None
            return result
        return _warpper

    def parse(self):
        items = self.soup.findAll('tr', {'class': 'app appimg'})
        data = []
        for item in items:
            game = {'name': self._get_name(item),
                    'price': self._get_price(item),
                    'discount': self._get_discount(item),
                    'app_id': self._get_app_id(item),
                    'rating': self._get_rating(item)}

            if game['app_id'] is None:
                continue
            data.append(game)

        return data

    def _get_name(self, item_soup):
        name_attr = item_soup.find('a', {'class': 'b'})
        if name_attr:
            return name_attr.text
        else:
            return None

    def _get_price(self, item_soup):
        price = self.price_re.findall(item_soup.text)
        if price:
            return int(price[0])
        else:
            return None

    def _get_discount(self, item_soup):
        discount = self.discoutn_re.findall(item_soup.text)
        if discount:
            return int(discount[0][1:-1])
        else:
            return None

    def _get_app_id(self, item_soup):
        game_attr = item_soup.find('a', {'class': 'b'})
        if game_attr:
            href = game_attr.get('href')
            return href.split('/')[-2]
        else:
            return None

    def _get_rating(self, item_soup):
        rate = self.rate_re.findall(item_soup.text)

        if rate:
            return int(rate[0][:-1])
        else :
            return None            

if __name__ == "__main__":
    p = Parser(open('test.html').read())
    print(p.parse())
