"""
WSGI config for mysite crawler_project.

It exposes the WSGI callable as a module-level variable named ``application``.

For more information on this file, see
https://docs.djangoproject.com/en/2.2/howto/deployment/wsgi/
"""

import os
import sys

from django.core.wsgi import get_wsgi_application

sys.path.append("/src/crawler_app")


os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'crawler_app.settings')

application = get_wsgi_application()
