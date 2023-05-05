<?php

namespace Controller\helpers;

use Model\Appointment;
use Src\Request;
use Src\View;

class DeleteMe
{
    public function deleteMe(Request $request): string
    {
//        var_dump($request->id);die();
        $delAppoint = Appointment::find($request->id);
        $delAppoint->delete();
        $appointments = Appointment::all();

        return new View('site.serchAppointment', [
            'appointments'=>$appointments
        ]);
    }
}