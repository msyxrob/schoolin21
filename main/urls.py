
from django.urls import path
from . import views

app_name = 'main'
urlpatterns = [
    path('', views.index, name='index'),
    path('students', views.class_detail, name='students'),
    path('class/<int:class_number>/', views.class_detail2, name='class_detail'),
    path('student/<str:name>/', views.student_detail, name='student_detail'),
    path('teacher/<str:name>/', views.teacher_detail, name='teacher_detail'),
    path('subject/<str:name>/', views.subject_detail, name='subject_detail'),
    path('teachers', views.teacher_list, name='teachers'),
]
