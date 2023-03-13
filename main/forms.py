from django import forms
from django.contrib.auth.models import Group, User




class UserRegistrationForm(forms.ModelForm):
    password = forms.CharField(
        label='Password', widget=forms.PasswordInput
    )
    group = forms.ModelChoiceField(
        label='Group',
        queryset=Group.objects.all(),
        widget=forms.Select(attrs={'class':'form-control'})
    )

    class Meta:
        model = User
        fields = ['username', 'email', 'password', 'group']

