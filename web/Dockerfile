FROM trafex/alpine-nginx-php7:1.2.0

# Crawler env
ENV	DB_SERV=
ENV	DB_USER=
ENV	DB_PASS=
ENV	DB_NAME=

USER root

RUN apk add php7-pdo_mysql php7-pdo

USER nobody

COPY --chown=nobody src/ /var/www/html/
