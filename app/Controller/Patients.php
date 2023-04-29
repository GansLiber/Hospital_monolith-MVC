<?php

namespace Controller;

use Model\Patient;
use Model\User;
use Src\Request;
use Src\View;

class Patients
{
    public function addPatient(Request $request): string
    {
        if ($request->method === 'POST' && Patient::create($request->all())) {
            return new View('site.registrat.addPatient', ['message' => 'Пациент добавлен']);
        }
        return new View('site.registrat.addPatient');
    }
}