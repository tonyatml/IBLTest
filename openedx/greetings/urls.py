from django.urls import path
from .views import GreetingsAPIView

urlpatterns = [
    path('api/greetings/', GreetingsAPIView.as_view(), name='greetings_api'),
]

