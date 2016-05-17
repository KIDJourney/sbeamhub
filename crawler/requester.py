import requests

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
            content = requests.get(STEAMDB_SALE_URL,headers=self.fake_header).text
        except TimeoutError:
            pass
        return content

if __name__ == "__main__":
    s = SaleRequester()
    print(s.get_sale_page())