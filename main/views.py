from django.shortcuts import render, get_object_or_404, redirect
from django.views.generic import DetailView
from .models import Class, Teacher, Student, Lesson
from .forms import UserRegistrationForm
from django.contrib.auth.forms import AuthenticationForm
from django.contrib.auth import login, logout
from django.contrib.auth.decorators import login_required



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
    school_classes = Class.objects.all()
    context = {'school_classes': school_classes}
    return render(request, 'main/index.html', context)

def student_detail(request, name):
    student = Student.objects.get(name=name)
    context = {'student': student}
    return render(request, 'main/student_detail.html', context)

def teacher_detail(request, name):
    teacher = Teacher.objects.get(name=name)
    context = {'teacher': teacher}
    return render(request, 'main/teacher_detail.html', context)


def register(request):
    if request.method == 'POST':
        form = UserRegistrationForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('index')
    else: form = UserRegistrationForm()
    return render(request, 'main/register.html', {'form': form})



def login_view(request):
    form = AuthenticationForm()
    if request.method == 'POST':
        form = AuthenticationForm(data=request.POST)
        if form.is_valid():
            # request.session.save()
            user = form.get_user()
            login(request, user)
            return redirect('index')
    context = {'form': form}
    return render(request, 'main/login.html', context)

def some_view(request):
    if request.user.is_authenticated: print(f'Пользователь {request.user.username} вошел в систему')
    else: print('Анонимный пользователь')


def logout_view(request):
    logout(request)
    return redirect('index')


@login_required
def my_view(request):
    return redirect('index')