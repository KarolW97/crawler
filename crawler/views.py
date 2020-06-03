from django.db import connection
from django.shortcuts import render, redirect
from django.views import generic
from crawler.models import Pracodawcy


def folder_update(request):
    if request.GET.get('id'):
        i = request.GET['id']
        obj = Pracodawcy.objects.get(pk=i)
        if obj.folder == 0:
            obj.folder = 1
        else:
            obj.folder = 0
        obj.save()
    return redirect("html/index.html")


def post_list(request):
    pracodawcy_list = Pracodawcy.objects.all()
    return render(request, 'html/index.html', {'pracodawcy': pracodawcy_list})


def kontakt_update(request):
    if request.GET.get('id'):
        i = request.GET['id']
        obj = Pracodawcy.objects.get(pk=i)
        if obj.kontakt == 0:
            obj.kontakt = 1
        else:
            obj.kontakt = 0
        obj.save()
    return redirect("html/index.html")


class PostList(generic.ListView):
    queryset = Pracodawcy.objects.filter(id=1).order_by('id')
    template_name = "html/index.html"
    paginate_by = 3


class PostDetail(generic.DetailView):
    model = Pracodawcy
    template_name = 'post_detail.html'
