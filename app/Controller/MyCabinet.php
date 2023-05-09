<?php


namespace Controller;

use Model\Appointment;
use Model\Diagnose;
use Src\Request;
use Src\View;

class MyCabinet
{
    public function myCabinet(Request $request): string
    {
        $idUser = app()->auth::user()->id;
        $myAppointments = Appointment::where('id_user', $idUser)->get();

        if ($request->method === 'POST'){
            Diagnose::create([
                'disease' => $request->disease,
                'id_appointment' => $request->id_appointment
            ]);

            $myAppointments->load('diagnose');

            return new View('site.myCabinet', [
                'myAppointments' => $myAppointments,
            ]);
        }

        return new View('site.myCabinet', [
            'myAppointments' => $myAppointments,
        ]);
    }
}
