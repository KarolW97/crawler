from django.shortcuts import redirect, render
from crawler_app.models import Pracodawcy


def toggle(val):
    if val == 0:
        val = 1
    else:
        val = 0
    return val


def object_function(request, object_name, pk):
    if request.method == 'POST':
        if object_name == "kontakt":
            obj = Pracodawcy.objects.get(pk=pk)
            obj.kontakt = toggle(obj.kontakt)
        if object_name == "folder":
            obj = Pracodawcy.objects.get(pk=pk)
            obj.folder = toggle(obj.folder)
    obj.save()