# Generated by Django 4.1.4 on 2023-03-17 13:33

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('main', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='subjectlesson',
            name='teachers',
            field=models.ManyToManyField(blank=True, null=True, to='main.teacher'),
        ),
    ]