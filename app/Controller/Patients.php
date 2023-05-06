<?php

namespace Controller;

use Model\Patient;
use Model\User;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Patients
{
    public function addPatient(Request $request): string
    {
        $data = $request->only([
            'name',
            'surname',
            'patronymic',
            'date_birth'
        ]);
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'surname' => ['required'],
                'patronymic' => ['required'],
                'date_birth' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if ($validator->fails()) {
                $message = json_encode($validator->errors(), JSON_UNESCAPED_UNICODE);
                return new View('site.registrat.addPatient',
                    ['message' => $message,
//                        'errors'=>$message
                    ]);
            }
            Patient::create($data);
            return new View('site.registrat.addPatient', ['message' => 'Пациент добавлен']);
        }
        return new View('site.registrat.addPatient');
    }
}