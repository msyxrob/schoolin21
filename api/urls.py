
from django.urls import path
from . import views

app_name = 'api'

urlpatterns = [
    path('get-names/', views.get_names, name='get_names'),
]
