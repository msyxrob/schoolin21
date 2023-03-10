
from django.urls import path
from . import views


urlpatterns = [
    path('', views.index, name='index'),
    path('details', views.class_detail, name='details'),
    path('class/<int:class_number>/', views.class_detail2, name='class_detail'),
    path('teachers', views.teacher_list, name='teachers'),
]
