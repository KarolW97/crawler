FROM python:3.8-alpine as base
RUN mkdir -p /app
WORKDIR /app
COPY /src .

RUN pip install -r requirements.txt


ENV	DB_SERV=
ENV	DB_USER=
ENV	DB_PASS=
ENV	DB_NAME=
ENV SECRET_KEY=

RUN python manage.py collectstatic --noinput

VOLUME [ "/app/static" ]

EXPOSE 8000

ENTRYPOINT [ "gunicorn", "project.wsgi:application" ]
CMD [ "-b", "unix:/mnt/gunicorn.socket", "--workers", "5" ]










