<?php

namespace Controller;

use Model\Cabinet;
use Model\Patient;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Cabinets
{
    public function addCabinet(Request $request): string
    {
        $data = $request->only(['numberCab', 'floor']);

        if ($request->method === 'POST') {
                $validator = new Validator($request->all(), [
                    'numberCab' => ['required','digits'],
                    'floor'=>['required','digits'],
                ], [
                    'required' => 'Поле :field пусто',
                ]);

                if($validator->fails()){
                    $message = json_encode($validator->errors(), JSON_UNESCAPED_UNICODE);
                    return new View('site.admin.signup',
                        ['message' => $message,
                        ]);
                }
            Cabinet::create($data);
            return new View('site.admin.signup', ['message' => 'Кабинет добавлен']);
        }
        return new View('site.admin.signup');
    }
}