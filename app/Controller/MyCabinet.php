<?php

namespace Controller;

use Model\Appointment;
use Model\Diagnoses;
use Src\Request;
use Src\View;

class MyCabinet
{
    public function myCabinet(Request $request): string
    {
        $payload = $request->all();
        if ($request->method === 'POST'){
            Diagnoses::create([
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