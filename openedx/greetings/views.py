import logging
from django.urls import reverse
from django.http import JsonResponse
from django.views import View
import requests
from openedx.core.lib.api.view_utils import view_auth_classes

from .models import Greeting

logger = logging.getLogger(__name__)

@view_auth_classes()
class GreetingsAPIView(View):

    def post(self, request, *args, **kwargs):
        greeting = request.POST.get('greeting')
        
        # Log the greeting in the LMS logs
        logger.info('User greeting: {}'.format(greeting))
        
        # Save the greeting in the database
        Greeting.objects.create(greeting=greeting)
        
        # Check if the greeting is 'hello'
        if greeting.lower() == 'hello':
            # Call the original greeting endpoint again with 'goodbye'
            url = reverse('greetings_api')
            data = {'greeting': 'goodbye'}
            requests.post(request.build_absolute_uri(url), data=data)
            return JsonResponse({'message': 'Greeting saved and original endpoint called with "goodbye".'})
        else:
            return JsonResponse({'message': 'Greeting saved.'})
