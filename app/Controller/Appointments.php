<?php

namespace Controller;

use Model\Appointment;
use Model\Cabinet;
use Model\Patient;
use Model\User;
use Src\Request;
use Src\View;

class Appointments
{
    public function addAppointment(Request $request): string
    {
        $docs = User::getDoctors();
        $patients = Patient::getPatients();
        $cabinets = Cabinet::getAllCabinets();
        $appointments = Appointment::getAllAppointments();
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