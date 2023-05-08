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
        $payload = $request->all();
        $idUser = app()->auth::user()->id;
        $myAppointments = Appointment::where('id_user', $idUser)->get();
        if ($request->method === 'POST'){
            Diagnose::create([
                'disease' => $payload['disease'],
                'id_appointment' => $payload['id_appointment']]);
            return new View('site.myCabinet', [
                'myAppointments'=>$myAppointments,
            ]);
        }

        return new View('site.myCabinet', [
            'myAppointments'=>$myAppointments,
        ]);
    }
}