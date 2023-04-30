<?php

namespace Controller;

use Model\Cabinet;
use Model\Post;
use Src\Session;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;

class Site
{
//    public function index(Request $request): string
//    {
//        $posts = Post::where('id', $request->id)->get();
//        return (new View())->render('site.post', ['posts' => $posts]);
//    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
    public function nick(): string
    {
        $name = Session::get('name');
        $session = Session::getAll();
        return new View('site.nick', [
            'name' => $name,
            'session'=>$session,
        ]);
    }


    public function patients(): string
    {
        $users = User::all();
        return new View('site.patients', [
            'users'=>$users
        ]);
    }

    public function signup(): string
    {
        return new View('site.signup');
    }

    public function addUser(Request $request): string
    {
        $data = $request->only([
            'name',
            'surname',
            'patronymic',
            'login',
            'password',
            'id_role',
            'position',
            'id_specialization',
            'date_birth'
        ]);
        if ($request->method === 'POST' && User::create($data)) {
            return new View('site.signup', ['message' => 'Пользователь добавлен']);
        }
        return new View('site.signup');
    }
    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
}
