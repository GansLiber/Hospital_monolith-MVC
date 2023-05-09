<?php

namespace Controller;

use Model\Cabinet;
use Model\Post;
use Src\Session;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;

class Site
{

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
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required','letter'],
                'surname'=>['required','letter'],
                'patronymic'=>['required','letter'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required'],
                'date_birth' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                $message = json_encode($validator->errors(), JSON_UNESCAPED_UNICODE);
                return new View('site.admin.signup',
                    ['message' => $message,
//                        'errors'=>$message
                    ]);
            }
            User::create($data);
            return new View('site.admin.signup', ['message' => 'Пользователь добавлен']);
        }
        return new View('site.admin.signup');
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
