from main.models import Student
from django.shortcuts import render
from django.http import JsonResponse
from django.conf import settings
import os

def get_names(request):
    search = request.GET.get('search')
    payload = []
    if search:
        objs = Student.objects.filter(name__startswith = search)
        for obj in objs:
            payload.append({
                'name': obj.name,
            })

    return JsonResponse({
        'status': True,
        'payload': payload
    })


