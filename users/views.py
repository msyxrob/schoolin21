from django.shortcuts import render, get_object_or_404, redirect
from django.contrib import auth, messages
from users.models import User
from users.forms import UserLoginForm, UserRegistrationForm, UserProfileForm


def check_permission(request, permission):
    return request.user.groups.filter(name=permission).exists()


def login_user(request):
    if request.method == 'POST':
        form = UserLoginForm(data=request.POST)
        if form.is_valid():
            username = request.POST['username']
            password = request.POST['password']
            user = auth.authenticate(username=username, password=password)
            if user:
                auth.login(request, user)
                messages.success(request, 'Вы успешно вошли в аккаунт')
                return redirect('main:index')
    else: form = UserLoginForm()
    context = {'form': form}
    return render(request, 'users/login.html', context)


def register_user(request):
    if check_permission(request, 'Admin') or check_permission(request, 'Director'):
        if request.method == 'POST':
            form = UserRegistrationForm(data=request.POST)
            if form.is_valid():
                user = form.save(commit=False)
                user.set_password(form.cleaned_data['password1'])
                user.set_password(form.cleaned_data['password2'])
                user.save()
                group = form.cleaned_data['group']
                group.user_set.add(user)
                user = auth.authenticate(
                    username=form.cleaned_data['username'],
                    password1=form.cleaned_data['password1'],
                    password2=form.cleaned_data['password2'],
                )
                messages.success(request, 'Пользователь успешно зарегистрирован')
                return redirect('users:register')
        else: form = UserRegistrationForm()
        return render(request, 'users/register.html', {'form': form})
    else: return render(request, 'users/error.html', {'error': '404 Page Not Found'})



def logout_view(request):
    messages.success(request, 'Вы вышли с аккаунта!')
    print(f'Пользователь {request.user.username} вышел с аккаунта')
    auth.logout(request)
    return redirect('main:index')


def profile(request):
    if request.method == 'POST':
        form = UserProfileForm(instance=request.user, data=request.POST, files=request.FILES)
        if form.is_valid():
            form.save()
            return redirect('users:profile')
        else: print(form.errors)
    else: form = UserProfileForm(instance=request.user)
    context = {'form': form}
    return render(request, 'users/profile.html', context)
