<?php

namespace Controller;

use Model\Appointment;
use Model\Cabinet;
use Src\Request;
use Src\View;

class Appointments
{
    public function addAppointment(Request $request): string
    {
        if ($request->method === 'POST' && Appointment::create($request->all())) {
            return new View('site.registrat.addAppointments', ['message' => 'Запись добавлена']);
        }
        return new View('site.registrat.addAppointments');
    }
}