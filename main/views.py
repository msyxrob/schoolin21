from django.shortcuts import render, get_object_or_404
from django.views.generic import DetailView
from .models import Class, Teacher, Student


# def index(request):
#     classes = list(range(1, 12))
#     return render(request, 'main/index.html', {'classes': classes})


def class_detail2(request, class_number):
    class_obj = get_object_or_404(Class, class_number=class_number)
    students = class_obj.students.all()
    print(students)
    context = {'class_number': class_number, 'students': students}
    return render(request, 'main/class_detail.html', context)



def class_detail(request):
    students = Student.objects.all()
    context = {'students': students}
    return render(request, 'main/class_detail.html', context)



def teacher_list(request):
    teachers = Teacher.objects.all()
    return render(request, 'main/teacher_list.html', {'teachers': teachers})



# def index(request, school_classes=None):
#     classes = range(1, 12)
#     return render(request, 'school_classes/index.html', {'SchoolClass': school_classes})



# def class_detail(request, class_number):
#     class_obj = Class.objects.get(class_number=class_number)
#     students = class_obj.students.all()
#     context = {'class_obj': class_obj, 'students': students}
#     return render(request, 'main/class_detail.html', context)


# class StudentDetailView(DetailView):
#     model = Student
#     template_name = 'main/student_detail.html'
#     context_object_name = 'student'


def index(request):
    school_classes = Class.objects.all()
    context = {'school_classes': school_classes}
    return render(request, 'main/index.html', context)
