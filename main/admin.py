from django.contrib import admin
from .models import *


admin.site.register(Teacher)
admin.site.register(Lesson)
admin.site.register(Class)
admin.site.register(LessonTime)
admin.site.register(SubjectLesson)
admin.site.register(Nation)
admin.site.register(Gender)
admin.site.register(Category)

@admin.register(Student)
class StudentAdmin(admin.ModelAdmin):
    # list_display = ('name', )
    # fields = ('name',)
    search_fields = ('name',)
    ordering = ('name',)

    def get_readonly_fields(self, request, obj=None):
        if request.user.is_superuser:
            return super().get_readonly_fields(request, obj=obj)
        if request.user.groups.filter(name='Bugalter').exists():
            return self.readonly_fields + ('name','date_of_birth', 'date_of_enrollment')
