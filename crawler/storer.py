"""
    Store Data to database
"""
import pymysql


class Storer:
    class DataBaseNotSupported(Exception):
        pass

    def __init__(self):
        self.config_file = '../.env'
        self._parse()
        self.connector = pymysql.connect(
            host=self.config['DB_HOST'],
            user=self.config['DB_USERNAME'],
            password=self.config['DB_PASSWORD'],
            db=self.config['DB_DATABASE'],
            cursorclass=pymysql.cursors.DictCursor
        )

    def _parse(self):
        config = filter(lambda x: len(x) != 0, open(
            self.config_file).read().split('\n'))
        config = {c[:c.find('=')]: c[c.find('=') + 1:] for c in config}
        config = {key: config[key] for key in [
            'DB_DATABASE', 'DB_HOST', 'DB_PASSWORD', 'DB_PORT', 'DB_USERNAME', 'DB_CONNECTION']}

        self.config = config

        if config['DB_CONNECTION'] != 'mysql':
            raise DataBaseNotSupported(
                "The Database your are using is not supported")

    def store(self, sale_list):
        with self.connector.cursor() as cursor:
            for sale in sale_list:
                sql = """INSERT INTO sales
                        (`app_id`,`name`,`discount`,`price`)
                        VALUES
                        (%s,%s,%s,%s)
                        """
                data = {}
                for key, value in sale.items():
                    data[key] = value if value is not None else "NULL"

                cursor.execute(sql, (data['app_id'], data['name'], data[
                               'discount'], data['price']))

        self.connector.commit()

if __name__ == "__main__":
    data = [{'app_id': '372390', 'price': 115, 'rating': 16,
             'name': 'D3DGear - Game Recording and Streaming Software', 'discount': 16},{'app_id': '372390', 'price': 115, 'rating': 16,
             'name': 'D3DGear - Game Recording and Streaming Software', 'discount': 16}]
    s = Storer()
    s.store(data)
