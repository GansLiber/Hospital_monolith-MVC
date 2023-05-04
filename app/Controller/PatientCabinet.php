<?php

namespace Controller;

use Src\Request;
use Model\Patient;
use Src\View;

class PatientCabinet
{
    public function patientCabinet(Request $request){
        $patient = Patient::where('id_patient', $request->id)->first();
        return (new View())->render('site.patientCabinet', ['patient'=>$patient]);
    }
}