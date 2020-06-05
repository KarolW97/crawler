import json
from urllib.request import Request, urlopen
import pymysql
import os
from bs4 import BeautifulSoup
from pymysql import IntegrityError

BASE_URL = "https://www.pracuj.pl/praca/"
site = BASE_URL + "zabbix;kw"
hdr = {'User-Agent': 'Mozilla/5.0'}
req = Request(site, headers=hdr)
page = urlopen(req)
soup = BeautifulSoup(page, "html.parser")
data = soup.find_all('script', type='application/ld+json')

def remove_duplicates(l):
    return list(set(l))

##zapisywanie do pliku ####
with open('pracodawcy.txt', 'w') as f:
    for item in data:
        f.write("%s\n" % item)

###usuwanie lini z <script>#######
error = ['<']
with open('pracodawcy.txt') as oldfile, open('nowi_pracodawcy.json', 'w') as newfile:
    for line in oldfile:
        if not any(bad_word in line for bad_word in error):
            newfile.write(line)
###usuwanie pustych lini#####
with open('nowi_pracodawcy.json') as infile, open('nowi_pracodawcy2.json', 'w') as outfile:
    for line in infile:
        if not line.strip(): continue  # skip the empty line
        outfile.write(line)

###wrzucanie do DB####

mydb = pymysql.connect(host=os.getenv("DB_SERV"), user=os.getenv("DB_USER"), passwd=os.getenv("DB_PASS"), db=os.getenv("DB_NAME"))

cursor = mydb.cursor()

with open('nowi_pracodawcy2.json') as my:
    for element in my:
        try:
            str_element = (str(element))
            j_element = json.loads(str_element)
            #print(j_element['jobLocation']['address']['addressLocality'])
            cursor.execute("INSERT INTO pracodawcy (nazwa, data_dodania,adres,link,kontakt) VALUES (%s,%s,%s,%s,0)",
                           (j_element['hiringOrganization']['name'],
                            j_element['datePosted'],
                            j_element['jobLocation']['address']['addressLocality'],
                            BASE_URL + j_element['hiringOrganization']['name'] + " zabbix"
                           )
                           )
        # pracodawcy.append(j_element['hiringOrganization']['name'],j_element['datePosted'])
        except IntegrityError:
            print("Duplikat")





mydb.commit()
cursor.close()
mydb.close()

