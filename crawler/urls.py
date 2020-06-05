from django.urls import path
from . import views

app_name = 'crawler'

urlpatterns = [
path('folder_update', views.folder_update, name='folder_update'),
path('contact_update',views.contact_update,name='contact_update'),


    path('', views.post_list, name='html/index.html'),]

