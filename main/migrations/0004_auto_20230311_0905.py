# Generated by Django 3.2.16 on 2023-03-11 09:05

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('main', '0003_auto_20230311_0902'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='lesson',
            name='end_time',
        ),
        migrations.RemoveField(
            model_name='lesson',
            name='start_time',
        ),
    ]
