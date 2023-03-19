import os
from django.db import models
from django.contrib.auth.models import AbstractUser, BaseUserManager, PermissionsMixin, UserManager
from django.conf import settings



class User(AbstractUser):
    image = models.ImageField(upload_to='users_images', null=True, blank=True)


class Folder(models.Model):
    name = models.CharField(max_length=255)
    owner = models.ForeignKey(User, on_delete=models.CASCADE)
    parent_folder = models.ForeignKey('self', on_delete=models.CASCADE, blank=True, null=True)

    def __str__(self):
        return self.name

class File(models.Model):
    name = models.CharField(max_length=255)
    file = models.FileField(upload_to='uploads/')
    owner = models.ForeignKey(User, on_delete=models.CASCADE)
    folder = models.ForeignKey(Folder, on_delete=models.CASCADE)

    def __str__(self):
        return self.name
