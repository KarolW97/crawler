FROM python:3

RUN mkdir /code
WORKDIR /code
#Upgrade pip
RUN pip install pip -U
ADD requirements.txt /code/
#Install dependencies
RUN pip install -r requirements.txt
ADD . /code/

