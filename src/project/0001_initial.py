# Generated by Django 2.2.8 on 2019-12-10 12:04

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Pracodawcy',
            fields=[
                ('id', models.AutoField(db_column='ID', primary_key=True, serialize=False)),
                ('nazwa', models.CharField(max_length=255, unique=True)),
                ('adres', models.TextField()),
                ('data_dodania', models.DateField(blank=True, null=True)),
                ('link', models.CharField(max_length=255)),
                ('folder', models.IntegerField()),
                ('kontakt', models.IntegerField()),
            ],
        ),
    ]
