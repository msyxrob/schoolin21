from django.contrib import admin
from .models import Student, Teacher, Lesson, Class

admin.site.register(Student)
admin.site.register(Teacher)
admin.site.register(Lesson)
admin.site.register(Class)
