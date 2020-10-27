FROM python:3

RUN mkdir /src/app
WORKDIR /src/app
RUN pip install pip -U
ADD requirements.txt /code/
RUN pip install -r requirements.txt
ADD . /src/app

