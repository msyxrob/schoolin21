
from django.urls import path

from . import views

app_name = 'main'
urlpatterns = [
    path('', views.index, name='index'),
    path('class/<int:pk>/', views.class_detail, name='class_detail'),
    path('detail/', views.class_detail, name='detail'),

]
