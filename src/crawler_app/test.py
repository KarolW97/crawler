from .models import Pracodawcy
from django.test import TestCase
from django.test.client import RequestFactory
from .views import post_list, folder_update, contact_update
from django.urls import reverse
from django.test.client import Client


def populate_test_db():
    """
    Adds records to an empty test database
    """
    pracodawca = Pracodawcy.objects.create(
        id=1,
        nazwa='examplename',
        kontakt='0',
        data_dodania='2077-12-10',
        adres='Night City',
        link='google.com',
        folder='0'
    )


class RequestTests(TestCase):

    def setUp(self):
        # Every test needs access to the request factory.
        self.factory = RequestFactory()
        # Add records to test DB
        populate_test_db()

    def test_home_view_without_client(self):
        request = self.factory.get('/')
        response = post_list(request)
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, "Miasto")

    def test_folder_update(self):
        pracodawca = Pracodawcy.objects.get(pk=1)
        self.assertEqual(pracodawca.kontakt, 0)
        response = self.client.post(
            reverse('folder_update', kwargs={'pk': 1}),
            {'kontakt': '1'}
        )

        self.assertEqual(response.status_code, 302)
        pracodawca = Pracodawcy.objects.get(pk=1)
        self.assertEqual(pracodawca.kontakt, 1)
