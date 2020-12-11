FROM dmcontainerregistry.azurecr.io/baseimages/python-alpine
RUN mkdir -p /app
WORKDIR /app
COPY /src .

RUN pip install -r requirements.txt

ENV CRAWLER_SECRET_KEY =
ENV CRAWLER_ALLOWED_HOSTS =
ENV CRAWLER_DB_PASS =
ENV	CRAWLER_DB_USER =
ENV	CRAWLER_DB_NAME =
ENV CRAWLER_DB_HOST =
ENV CRAWLER_DB_PORT =

RUN python manage.py collectstatic --noinput

VOLUME [ "/app/static" ]

EXPOSE 8000

ENTRYPOINT [ "gunicorn", "crawler_project.wsgi:application" ]
CMD [ "-b", ":8000"]