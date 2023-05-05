<?php

namespace Controller;


use Illuminate\Database\Eloquent\Model;
use Model\User;
use Model\Patient;
use Src\Request;
use Src\View;

class SerchPatients
{
    public function serchPatients(Request $request): string
    {
        $patients = Patient::all();
        if ($request->method === 'POST'){
            $findPatients = Patient::where('name','LIKE',"%{$request->name}%")->get();
            return new View('site.serchPatients', [
                'patients'=>$findPatients
            ]);
        }
        return new View('site.serchPatients', [
            'patients'=>$patients
        ]);
    }
}