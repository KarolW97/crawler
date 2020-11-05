FROM dmcontainerregistry.azurecr.io/baseimages/python-alpine:db32737b40f3129a9d0e8f926161ce7bc1ea2007
RUN mkdir -p /app
WORKDIR /app
COPY /src .

RUN pip install -r requirements.txt


ENV	DB_SERV=
ENV	DB_USER=
ENV	DB_PASS=
ENV	DB_NAME=
ENV SECRET_KEY=


VOLUME [ "/crawler_app/static/" ]

EXPOSE 8000

ENTRYPOINT [ "gunicorn", "project.wsgi:application" ]
CMD [ "-b", "unix:/mnt/gunicorn.socket", "--workers", "5" ]










