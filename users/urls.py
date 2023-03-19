
from django.urls import path
from . import views

app_name = 'users'

urlpatterns = [
    path('login/', views.login_user, name='login'),
    path('register/', views.register_user, name='register'),
    path('profile/', views.profile, name='profile'),
    path('logout/', views.logout_view, name='logout'),

    path('create_folder/', views.create_folder, name='create_folder'),
    path('upload_file/', views.upload_file, name='upload_file'),
    path('delete/<str:status>/<int:pk>/', views.delete_file_or_folder, name='delete_file_or_folder'),
    path('folder/<int:folder_id>/', views.view_folder, name='view_folder'),
    path('folders/', views.view_folders, name='view_folders'),
]
