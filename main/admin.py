from django.contrib import admin
from .models import Student, Teacher, Lesson, Class, LessonTime, SubjectLesson

admin.site.register(Student)
admin.site.register(Teacher)
admin.site.register(Lesson)
admin.site.register(Class)
admin.site.register(LessonTime)
admin.site.register(SubjectLesson)