from django.contrib.auth.forms import UserCreationForm
from django import forms
from .models import Profile, AccessLevel
from django.contrib.auth.models import User


class UserRegistrationForm(UserCreationForm):
    access_level = forms.ModelChoiceField(queryset=AccessLevel.objects.all())

    class Meta:
        model = User
        fields = ['username', 'password1', 'password2', 'access_level']

    def save(self, commit=True):
        user = super().save(commit=False)
        user.save()

        profile = Profile.objects.create(
            user=user,
            access_level=self.cleaned_data['access_level']
        )

        return profile