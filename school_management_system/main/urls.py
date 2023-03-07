# from django.urls import path
# from . import views
#
# app_name = 'main'
#
# urlpatterns = [
#     path('', views.index, name='index'),
#     path('class/<int:pk>/', views.class_detail, name='class_detail'),
#     path('student/<int:pk>/', views.StudentDetailView.as_view(), name='student_detail'),
# ]
from django.urls import path

from . import views

app_name = 'main'
urlpatterns = [
    path('', views.index, name='index'),
    path('class/<int:pk>/', views.class_detail, name='class_detail'),
]
