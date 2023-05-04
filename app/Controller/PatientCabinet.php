<?php

namespace Controller;

use Model\Appointment;
use Src\Request;
use Model\Patient;
use Src\View;

class PatientCabinet
{
    public function patientCabinet(Request $request): string
    {
        $patientAppointments = Appointment::where('id_patient',$request->id)->get();
        $patient = Patient::where('id_patient', $request->id)->first();
        if ($request->method ==='POST'){
            $udatePatient = [
                'name'=>$request->get('name'),
                'surname'=>$request->get('surname'),
                'patronymic'=>$request->get('patronymic'),
            ];
            $patient->update($udatePatient);
        }
        return new View('site.patientCabinet', [
            'patient'=>$patient,
            'patientAppointments'=>$patientAppointments
            ]);
    }
}