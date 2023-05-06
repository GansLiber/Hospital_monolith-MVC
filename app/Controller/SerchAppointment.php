<?php

namespace Controller;

use Model\Appointment;
use Model\Cabinet;
use Model\Patient;
use Model\Role;
use Src\Request;
use Src\View;

class SerchAppointment
{
    public function serchAppointment(Request $request): string
    {
        $docs = Role::where('role','doctor')->first()->users;
        $patients = Patient::all();
        $cabinets = Cabinet::all();
        $appointments = Appointment::all();
        if ($request->method === 'POST'){
//            var_dump($request); die();
            $findPatients = Appointment::where([
                ['id_user','LIKE',"%{$request->user}%"],
                ['id_patient','LIKE',"%{$request->patient}%"],
                ['id_cabinet','LIKE',"%{$request->cabinet}%"],
            ])->get();
            return new View('site.serchAppointment', [
                'appointments'=>$findPatients,
                'patients'=>$patients,
                'cabinets'=>$cabinets,
                'docs'=>$docs,
            ]);
        }
        return new View('site.serchAppointment', [
            'appointments'=>$appointments,
            'patients'=>$patients,
            'cabinets'=>$cabinets,
            'docs'=>$docs,
        ]);
    }
}