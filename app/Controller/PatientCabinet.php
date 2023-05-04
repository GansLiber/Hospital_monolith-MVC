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
        var_dump($patientAppointments); die();
        $patient = Patient::where('id_patient', $request->id)->first();
        return new View('site.patientCabinet', ['patient'=>$patient]);
    }
}