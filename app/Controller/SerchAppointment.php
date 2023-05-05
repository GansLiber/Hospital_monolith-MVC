<?php

namespace Controller;

use Model\Appointment;
use Model\Patient;
use Src\Request;
use Src\View;

class SerchAppointment
{
    public function serchAppointment(Request $request): string
    {
        $appointments = Appointment::all();
        if ($request->method === 'POST'){
//            var_dump($request);die();
            $findPatients = Appointment::where([
                ['name','LIKE',"%{$request->doctor}%"],
                ['surname','LIKE',"%{$request->patient}%"],
                ['cabinet','LIKE',"%{$request->cabinet}%"],
                ['date','LIKE',"%{$request->date}%"],
            ])->get();
            return new View('site.serchAppointment', [
                'patients'=>$findPatients
            ]);
        }
        return new View('site.serchAppointment', [
            'appointments'=>$appointments
        ]);
    }
}