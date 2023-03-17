from .models import *
import datetime
from faker import Faker
faker = Faker()

def createStudent(n):
    for i in range(n):
        name = faker.name()
        Student.objects.create(name=name, date_of_birth=datetime.datetime.now(), date_of_enrollment=datetime.datetime.now(), payment_percent=1, balance_due=1, paid_months=1)
