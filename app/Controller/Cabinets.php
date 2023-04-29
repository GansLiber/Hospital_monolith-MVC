<?php

namespace Controller;

use Model\Patient;
use Src\Request;
use Src\View;

class Cabinets
{
    public function addCabinet(Request $request): string
    {
        if ($request->method === 'POST' && Patient::create($request->all())) {
            return new View('site.registrat.addPatient', ['message' => 'Пользователь добавлен']);
        }
        return new View('site.registrat.addPatient');
    }
}