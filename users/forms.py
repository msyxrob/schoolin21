from django import forms
from django.contrib.auth.models import Group
from django.contrib.auth.forms import AuthenticationForm, UserCreationForm, UserChangeForm
from users.models import User


class UserLoginForm(AuthenticationForm):
    username = forms.CharField(widget=forms.TextInput(attrs={
        "class": "form-control",
        'placeholder': 'Username',
    }))
    password = forms.CharField(widget=forms.PasswordInput(attrs={
        "class": "form-control",
        'placeholder': 'Password',
    }))

    class Meta:
        model = User
        fields = ['username', 'password']



class UserRegistrationForm(UserCreationForm):
    first_name = forms.CharField(widget=forms.TextInput(attrs={"class": "form-control", 'placeholder': 'Name',}))
    last_name = forms.CharField(widget=forms.TextInput(attrs={"class": "form-control", 'placeholder': 'Surname',}))
    username = forms.CharField(widget=forms.TextInput(attrs={"class": "form-control", 'placeholder': 'Username',}))
    email = forms.CharField(widget=forms.EmailInput(attrs={"class": "form-control", 'placeholder': 'Email',}))
    password1 = forms.CharField(widget=forms.PasswordInput(attrs={"class": "form-control", 'placeholder': 'Password',}))
    password2 = forms.CharField(widget=forms.PasswordInput(attrs={"class": "form-control", 'placeholder': 'Confirm Password',}))
    group = forms.ModelChoiceField(queryset=Group.objects.all(),widget=forms.Select(attrs={'class':'form-control', 'placeholder': 'Permissions',}))

    class Meta:
        model = User
        fields = ['first_name', 'last_name', 'username', 'email', 'password1', 'password2', 'group']


class UserProfileForm(UserChangeForm):
    first_name = forms.CharField(widget=forms.TextInput(attrs={"class": "form-control"}))
    last_name = forms.CharField(widget=forms.TextInput(attrs={"class": "form-control"}))
    image = forms.ImageField(widget=forms.FileInput(attrs={"class": "form-control"}), required=False)
    username = forms.CharField(widget=forms.TextInput(attrs={"class": "form-control", 'readonly': True}))
    email = forms.CharField(widget=forms.TextInput(attrs={"class": "form-control", 'readonly': True}))

    
    class Meta:
        model = User
        fields = ['first_name', 'last_name', 'image', 'username', 'email']


