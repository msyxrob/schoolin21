from django.shortcuts import render, get_object_or_404, redirect
from .models import Class, Teacher, Student, Lesson, SubjectLesson
from django.contrib.auth.forms import AuthenticationForm
from django.contrib.auth import login, logout, authenticate
from django.contrib.auth.decorators import login_required
from .forms import UserRegistrationForm


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

def teacher_detail(request, name):
    teacher = Teacher.objects.get(name=name)
    context = {'teacher': teacher}
    return render(request, 'main/teacher_detail.html', context)

def subject_detail(request, name):
    subject = SubjectLesson.objects.get(nameSubject=name)
    context = {'subjectName': name, 'teachers': subject.teachers.all()}
    return render(request, 'main/subject_detail.html', context)




def register(request):
    if check_permission(request, 'Admin') or check_permission(request, 'Director'):
        if request.method == 'POST':
            form = UserRegistrationForm(request.POST)
            if form.is_valid():
                user = form.save(commit=False)
                user.set_password(form.cleaned_data['password'])
                user.save()
                group = form.cleaned_data['group']
                group.user_set.add(user)
                user = authenticate(
                    username=form.cleaned_data['username'],
                    password=form.cleaned_data['password'],
                )
                return redirect('register')
        else: form = UserRegistrationForm()
        return render(request, 'main/register.html', {'form': form})
    else: return render(request, 'main/error.html', {'error': '404 Page Not Found'})



def login_view(request):
    form = AuthenticationForm()
    if request.method == 'POST':
        form = AuthenticationForm(data=request.POST)
        if form.is_valid():
            user = form.get_user()
            login(request, user)
            return redirect('index')
    context = {'form': form}
    return render(request, 'main/login.html', context)


def some_view(request):
    if request.user.is_authenticated: print(f'Пользователь {request.user.username} вошел в систему')
    else: print('Анонимный пользователь')


def logout_view(request):
    print(f'Пользователь {request.user.username} вышел с аккаунта')
    logout(request)
    return redirect('index')

