import parser
import requester
import storer

if __name__ == "__main__":
    sales = requester.SaleRequester()
    content = sales.get_sale_page()
    p = parser.Parser(content)
    sales = p.parse()
    print(sales)
    s = storer.Storer()
    s.store()