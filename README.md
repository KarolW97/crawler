# DjangoCrawler 

Crawler's a simple application for scraping and displaying specific results of the pracuj.pl.
Script retrieves data from pracuj.pl once a day, adds them into the database, then they're displayed on the page as a table.

##Environment variables

##### MySQL database related variables

`ENV CRAWLER_DB_HOST` 
Database host  

`ENV CRAWLER_DB_USER` 
Username used to authenticate application in database  

`ENV CRAWLER_DB_PASS`
Password for database user  

`ENV CRAWLER_DB_NAME` 
Name of database

`ENV CRAWLER_DB_PORT`
Database port
## Build and Setup


```bash
pip install -r requirements.txt

manage.py runserver 0.0.0.0:8000
```

or

```bash
docker-compose up -d 
```

