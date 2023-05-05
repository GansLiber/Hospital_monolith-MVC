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
        $user = app()->auth::user();
        $myPatients = $user->getMyPatients;
        $disease = Diagnoses::all();
        if ($request->method === 'POST' && Diagnoses::create($request->disease)){
            return new View('site.myCabinet', [
                'myPatients'=>$myPatients,
            ]);
        }
        return new View('site.myCabinet', [
            'myPatients'=>$myPatients,
        ]);
    }
}