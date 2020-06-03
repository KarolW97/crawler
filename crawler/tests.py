from django.test import TestCase
from crawler.x import magic
import unittest
# Create your tests here.

class Test_Magic(TestCase):

    def test_magic(self):
        x = "aa"
        expected = "Hokus pokus: {x}".format(x=x)
        self.assertEqual(expected, magic(x))


# if __name__ == "__main__":
#     unittest.main()
