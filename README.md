# DjangoCrawler 

Crawler's a simple application for scraping and displaying specific results of the pracuj.pl.
Script retrieves data from pracuj.pl once a day, adds them into the database, then they're displayed on the page as a table.

##Environment variables

##### MySQL database related variables

`DB_SERV` 
Database host  
`DB_USER` 
Username used to authenticate application in database  
`DB_PASS`
Password for database user  
`DB_NAME` 
Name of database
## Build and Setup



```bash
pip install -r requirements.txt

manage.py runserver 0.0.0.0:8000
```

or

```bash
docker-compose up -d 
```

