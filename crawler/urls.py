from django.urls import path
from . import views

app_name = 'crawler'

urlpatterns = [
path('folder_update', views.folder_update, name='folder_update'),
path('kontakt_update',views.kontakt_update,name='kontakt_update'),


    path('', views.post_list, name='html/index.html'),]

