# DeMartiniRV

### Development

For MacOS and Linux:
1. Install docker (via docker-for-mac).
1. Run `docker-compose up --build` (this will automatically start the webserver, mysql and phpMyAdmin).
1. Create a database `demartinirv`
1. Create a database user `masterchief`, via `mysql --port=3306 --host=127.0.0.1 --user=root --password="root_superp@55" --database=demartinirv --execute="CREATE USER 'masterchief'@'localhost' IDENTIFIED BY 'superpa@55'"`
1. Import the latest mysql dump via `mysql --port=3306 --host=127.0.0.1 --user=masterchief --password="superp@55" --database=demartinirv < database-dump.sql`
1. Application should be running at `localhost:8888`
