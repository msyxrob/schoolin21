from django.db import models


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

    def __str__(self):
        return self.name


class Lesson(models.Model):
    DAY_CHOICES = [
        ('MON', 'Monday'),
        ('TUE', 'Tuesday'),
        ('WED', 'Wednesday'),
        ('THU', 'Thursday'),
        ('FRI', 'Friday'),
    ]
    day = models.CharField(choices=DAY_CHOICES, max_length=3)
    start_time = models.TimeField()
    end_time = models.TimeField()
    class_name = models.ForeignKey('Class', on_delete=models.CASCADE)
    teacher = models.ForeignKey('Teacher', on_delete=models.CASCADE)

    def __str__(self):
        return f"{self.class_name} - {self.day} - {self.start_time} - {self.teacher}"


class Class(models.Model):
    class_number = models.IntegerField()
    students = models.ManyToManyField(Student)
    teachers = models.ManyToManyField(Teacher)

    def __str__(self):
        return f"Class {self.class_number}"
