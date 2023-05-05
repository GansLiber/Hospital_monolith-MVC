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
        if ($request->method === 'POST'){
            Diagnose::create([
                'disease' => $payload['disease'],
                'id_appointment' => $payload['id_appointment']]);
        }

        $user = app()->auth::user();
        $myPatients = $user->getMyPatients;
        return new View('site.myCabinet', [
            'myPatients'=>$myPatients,
        ]);
    }
}