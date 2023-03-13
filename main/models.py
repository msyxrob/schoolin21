from django.db import models

def retTime():
    from datetime import datetime, timedelta
    fTime = datetime.now().replace(hour=8, minute=0, second=0, microsecond=0)
    return fTime, fTime + timedelta(minutes=45)


class LessonTime(models.Model):
    hour_lesson = models.IntegerField()

    start_time = models.TimeField(default=retTime()[0])
    end_time = models.TimeField(default=retTime()[-1])

    def __str__(self):
        return f"Lesson {self.hour_lesson}"


class Student(models.Model):
    name = models.CharField(max_length=100)
    date_of_birth = models.DateField()
    date_of_enrollment = models.DateField()
    payment_percent = models.DecimalField(max_digits=5, decimal_places=2)
    balance_due = models.DecimalField(max_digits=10, decimal_places=2)
    paid_months = models.CharField(max_length=100)

    def __str__(self):
        return self.name


class Teacher(models.Model):
    name = models.CharField(max_length=100)
    date_of_birth = models.DateField()
    date_of_enrollment = models.DateField()
    teachSubj = models.ForeignKey('SubjectLesson', on_delete=models.CASCADE)

    def __str__(self):
        return self.name


class Class(models.Model):
    class_number = models.IntegerField()
    students = models.ManyToManyField(Student)
    teachers = models.ManyToManyField(Teacher)

    def __str__(self):
        return f"Class {self.class_number}"



class Lesson(models.Model):
    DAY_CHOICES = [
        ('MON', 'Monday'),
        ('TUE', 'Tuesday'),
        ('WED', 'Wednesday'),
        ('THU', 'Thursday'),
        ('FRI', 'Friday'),
    ]
    day = models.CharField(choices=DAY_CHOICES, max_length=3)
    lesson_time = models.ForeignKey(LessonTime, on_delete=models.CASCADE)
    class_name = models.ForeignKey(Class, on_delete=models.CASCADE)
    teacher = models.ForeignKey(Teacher, on_delete=models.CASCADE)
    def __str__(self):
        return f"{self.class_name} - {self.day} - {self.lesson_time} - {self.teacher}"



class SubjectLesson(models.Model):
    nameSubject = models.CharField(max_length=100)
    teachers = models.ManyToManyField(Teacher)

    def __str__(self):
        return self.nameSubject

