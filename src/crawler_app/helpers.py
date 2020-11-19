from django.shortcuts import redirect, render
from crawler_app.models import Pracodawcy


def folder_function(request):
    if request.GET.get('id'):
        i = request.GET['id']
        obj = Pracodawcy.objects.get(pk=i)
        if obj.folder == 0:
            obj.folder = 1
        else:
            obj.folder = 0
        obj.save()


def contact_function(request):
    if request.GET.get('id'):
        i = request.GET['id']
        obj = Pracodawcy.objects.get(pk=i)
        if obj.kontakt == 0:
            obj.kontakt = 1
        else:
            obj.kontakt = 0
        obj.save()
