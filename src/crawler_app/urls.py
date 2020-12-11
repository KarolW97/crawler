from django.urls import path
from . import views

app_name = 'crawler_app'

urlpatterns = [
    path('', views.post_list, name='post_list'),
    path('folder_update/<int:pk>', views.folder_update, name='folder_update'),
    path('contact_update/<int:pk>', views.contact_update, name='contact_update'),
 ]
