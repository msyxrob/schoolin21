from django.contrib import admin
from .models import *

admin.site.register(Folder)
admin.site.register(File)

@admin.register(User)
class UserAdmin(admin.ModelAdmin):
    list_display = ('username', )
