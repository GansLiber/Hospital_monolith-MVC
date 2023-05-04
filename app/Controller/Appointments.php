<?php

namespace Controller;

use Model\Appointment;
use Model\Cabinet;
use Model\Patient;
use Model\Role;
use Model\User;
use Src\Request;
use Src\View;

class Appointments
{
    public function addAppointment(Request $request): string
    {
        $docs = Role::where('role','doctor')->first()->users;
        $patients = Patient::all();
        $cabinets = Cabinet::all();
        $appointments = Appointment::all();
//        echo '<pre>'; print_r($appointments);echo '</pre>'; die();
        if ($request->method === 'POST' && Appointment::create($request->all())) {
            return new View('site.registrat.addAppointments', [
                'message' => 'Запись добавлена',
                'docs'=>$docs,
                'patients'=>$patients,
                'cabinets'=>$cabinets,
                'appointments'=>$appointments
                ]);
        }
        return new View('site.registrat.addAppointments', [
            'docs'=>$docs,
            'patients'=>$patients,
            'cabinets'=>$cabinets,
            'appointments'=>$appointments
        ]);
    }

}