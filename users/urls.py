
from django.urls import path
from . import views

app_name = 'users'

urlpatterns = [
    path('login/', views.login_user, name='login'),
    path('register/', views.register_user, name='register'),
    path('profile/', views.profile, name='profile'),
    path('logout', views.logout_view, name='logout'),
]
