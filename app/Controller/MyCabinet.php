<?php

namespace Controller;

use Model\User;
use Src\View;

class MyCabinet
{
    public function myCabinet(): string
    {
        $name = User::get('name');
        $surname = User::get('surname');
        $patron = User::get('patronymic');
//        $dataBirth = User::get('date_birth');
        $docs = User::getDoctors();
        return new View('site.myCabinet', [
            'name' => $name,
            'surname' => $surname,
            'patronymic' => $patron,
//            'date_birth' => $dataBirth,
            'users'=>$docs
        ]);
    }
}