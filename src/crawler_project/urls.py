from django.contrib import admin
from django.urls import path,include

app_name = 'crawler_app'

urlpatterns = [
    path('',include('crawler_app.urls')),
]