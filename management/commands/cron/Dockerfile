FROM python:3.6-alpine3.10

# Crawler env
ENV	DB_SERV=
ENV	DB_USER=
ENV	DB_PASS=
ENV	DB_NAME=


ADD requirements.txt /tmp
RUN pip install -r /tmp/requirements.txt

ADD main.py /

ENTRYPOINT [ "python", "main.py" ]
