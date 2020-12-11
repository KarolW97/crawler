from django.http import HttpResponse
from django.shortcuts import render, redirect
from django.views import generic
from crawler_app.models import Pracodawcy
from crawler_app.helpers import object_function


def folder_update(request,pk):
    object_function(request,"folder",pk)
    return redirect(post_list)


def post_list(request):
    pracodawcy_list = Pracodawcy.objects.all().order_by('-data_dodania')
    return render(request, 'index.html', {'pracodawcy': pracodawcy_list})


def contact_update(request,pk):
    object_function(request,"kontakt",pk)
    return redirect(post_list)

