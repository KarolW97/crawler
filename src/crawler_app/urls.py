from django.urls import path

from crawler_app import views

app_name = 'crawler_app'

urlpatterns = [
    path('folder_update', views.folder_update, name='folder_update'),
    path('contact_update', views.contact_update, name='contact_update'),

    path('', views.post_list, name='src/crawler_app/templates/CrawlerDjango/index.html'), ]
