from django.db import models


class Pracodawcy(models.Model):
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.
    nazwa = models.CharField(unique=True, max_length=255)
    kontakt = models.IntegerField()
    data_dodania = models.DateField(blank=True, null=True)
    adres = models.TextField()
    link = models.CharField(max_length=255)
    folder = models.IntegerField()

    class Meta:
        db_table = "crawler_pracodawcy"
