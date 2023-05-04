<?php

namespace Controller;

use Model\Appointment;
use Src\Request;
use Src\View;

class SerchAppointment
{
    public function serchAppointment(Request $request): string
    {
        $appointments = Appointment::all();

        return new View('site.serchAppointment', [
            'appointments'=>$appointments
        ]);
    }
}