from django.shortcuts import render, get_object_or_404, redirect
from django.views.decorators.csrf import csrf_exempt
from .models import Class, Teacher, Student, Lesson, SubjectLesson
from django.contrib.auth import logout
import json

def check_permission(request, permission):
    return request.user.groups.filter(name=permission).exists()


def class_detail2(request, class_number):
    class_obj = get_object_or_404(Class, class_number=class_number)
    students = class_obj.students.all()
    lessons = Lesson.objects.filter(class_name=class_obj)
    context = {'class_number': class_number, 'students': students, 'action': 'class_detail', 'lessons': lessons}
    return render(request, 'main/class_detail.html', context)


def class_detail(request):
    students = Student.objects.all()
    context = {'students': students, 'action': 'students_detail', 'class_number': ''}
    return render(request, 'main/class_detail.html', context)


def teacher_list(request):
    teachers = Teacher.objects.all()
    return render(request, 'main/teacher_list.html', {'teachers': teachers})

def index(request):
    some_view(request)
    school_classes = Class.objects.all()
    permission = request.user.groups.values_list('name', flat=True)
    permission = 'Admin' in permission or 'Director' in permission
    context = {'school_classes': school_classes, 'user_permission': permission}
    return render(request, 'main/index.html', context)

def student_detail(request, name):
    student = Student.objects.get(name=name)
    context = {'student': student}
    return render(request, 'main/student_detail.html', context)


def student_info(request):
    if request.method == 'POST':
        name = json.loads(request.body)['name']
        student = Student.objects.get(name=name)
        context = {'student': student}
        return render(request, 'main/student_detail.html', context)
    else: return render(request, 'main/error.html', context={'error': 'Student not found'})




def teacher_detail(request, name):
    teacher = Teacher.objects.get(name=name)
    context = {'teacher': teacher}
    return render(request, 'main/teacher_detail.html', context)


def subject_detail(request, name):
    subject = SubjectLesson.objects.get(nameSubject=name)
    context = {'subjectName': name, 'teachers': subject.teachers.all()}
    return render(request, 'main/subject_detail.html', context)



def some_view(request):
    if request.user.is_authenticated: print(f'Пользователь {request.user.username} вошел в систему')
    else: print('Анонимный пользователь')

def search(request):
    context = {}
    return render(request, 'main/search.html', context=context)
