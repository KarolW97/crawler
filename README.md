
# About

Crawler's a simple application for scraping and displaying specific results of the pracuj.pl.
Script retrieves data from pracuj.pl once a day, adds them into the database, then they're displayed on the page as a table.
# Containers
List containers that aare used by this application.
If your application has only one container, you can omnit this section.

|Container|Description|
|---------|-----------|
|app|Django application|
|cron|Scraping script|

# Run and test

## Dependancies
None.
## Environment Variables
Here you enumerate all environment variables that can be defined for this application.
If your application has more than one container, put their env vars in seperate tables.

|Name|Default|Description|
|----|:-----:|-----------|
|CRAWLER_DB_HOST|-|Database host|
|CRAWLER_DB_USER|-|Username used to authenticate application in database|
|CRAWLER_DB_PASS|-|Password for database user|
|CRAWLER_DB_NAME|-|Name of database|
|CRAWLER_DB_PORT|-|Database port|
|CRAWLER_ALLOWED_HOSTS|-|Hosts (addresses) that can be used to access app |
|CRAWLER_SECRET_KEY|-|Django secret key|
## Running

## Testing
Soon
