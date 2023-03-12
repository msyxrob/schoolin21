
from django.urls import path
from . import views


urlpatterns = [
    path('', views.index, name='index'),
    path('students', views.class_detail, name='students'),
    path('class/<int:class_number>/', views.class_detail2, name='class_detail'),
    path('student/<str:name>/', views.student_detail, name='student_detail'),
    path('teacher/<str:name>/', views.teacher_detail, name='teacher_detail'),
    path('teachers', views.teacher_list, name='teachers'),
    path('register', views.register, name='register'),
    path('login', views.login_view, name='login'),
    path('logout', views.logout_view, name='logout'),
    
    path("teacher", views.teacher_home, name="teacher_home"),
    path("director", views.director_home, name="director_home"),
    path("student", views.student_home, name="student_home"),
]
