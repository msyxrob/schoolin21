# Generated by Django 3.2.16 on 2023-03-11 10:35

import datetime
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('main', '0005_auto_20230311_1027'),
    ]

    operations = [
        migrations.AlterField(
            model_name='lessontime',
            name='end_time',
            field=models.TimeField(default=datetime.datetime(2023, 3, 11, 8, 45)),
        ),
        migrations.AlterField(
            model_name='lessontime',
            name='start_time',
            field=models.TimeField(default=datetime.datetime(2023, 3, 11, 8, 0)),
        ),
    ]
