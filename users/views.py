from django.shortcuts import render, get_object_or_404, redirect
from django.contrib import auth, messages
from users.models import *
from users.forms import UserLoginForm, UserRegistrationForm, UserProfileForm
from django import forms
from django.contrib.auth.decorators import login_required




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
    else: return render(request, 'main/error.html', {'error': '404 Page Not Found'})



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


@login_required
def create_folder(request):
    if request.method == 'POST':
        name = request.POST['name']
        parent_folder_id = request.POST.get('parent_folder')
        if parent_folder_id:
            parent_folder = Folder.objects.get(id=parent_folder_id)
            folder = Folder.objects.create(name=name, owner=request.user, parent_folder=parent_folder)
        else:
            folder = Folder.objects.create(name=name, owner=request.user)
        return redirect('users:upload_file')
    else:
        folders = Folder.objects.filter(owner=request.user)
        return render(request, 'users/create_folder.html', {'folders': folders})




class FileForm(forms.ModelForm):
    class Meta:
        model = File
        fields = ['name', 'file', 'folder']


def upload_file(request):
    if request.method == 'POST':
        form = FileForm(request.POST, request.FILES)
        if form.is_valid():
            new_file = form.save(commit=False)
            new_file.owner = request.user
            new_file.save()
            return redirect('users:view_folder', folder_id=new_file.folder.id)
    else:
        form = FileForm()
    return render(request, 'users/upload.html', {'form': form})




def view_folder(request, folder_id=None):
    folder = Folder.objects.get(id=folder_id)
    files = File.objects.filter(folder=folder)

    file_list = []
    for f in files:
        file_item = {
            'name': f.file.name,
            'url': os.path.join(settings.MEDIA_URL, f.file.name),
            'pk': f.pk,
        }
        file_list.append(file_item)

    return render(request, 'users/view_folder.html', {
        'folder': folder,
        'files': file_list,
    })


def view_folders(request):
    folders = Folder.objects.all()
    return render(request, 'users/view_folders.html', {'folders': folders})



@login_required
def delete_file_or_folder(request, status, pk):
    if status == 'file':
        item = File.objects.get(pk=pk)
    elif status == 'folder':
        item = Folder.objects.get(pk=pk)
    else: return render(request, 'main/error.html', {'error': '404. Page not found'})

    if request.method == 'POST':
        item.delete()
        messages.success(request, f'{item.name} has been deleted')
        return redirect('users:view_folders')

    context = {
        'item': item,
    }
    return render(request, 'users/delete_item.html', context)