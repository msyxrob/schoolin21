from django.shortcuts import render, get_object_or_404
from django.views.generic import DetailView
from .models import Class, Teacher, Student, Lesson

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



class StudentDetailView(DetailView):
    model = Student
    template_name = 'main/student_detail.html'
    context_object_name = 'student'


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
