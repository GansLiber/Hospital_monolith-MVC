<?php

namespace Controller;

use Illuminate\Database\Eloquent\Model;
use Model\User;
use Model\Patient;
use Src\View;

class SerchPatients
{
    public function serchPatients(): string
    {
        $patients = Patient::all();
        return new View('site.serchPatients', [
            'patients'=>$patients
        ]);
    }
}