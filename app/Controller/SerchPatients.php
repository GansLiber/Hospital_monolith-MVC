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
        if (\Src\Auth\Auth::user()->getRole->role ==='doctor'){
            $user = app()->auth::user();
            $docFindPatients = $user->getMyPatients;

            if ($request->method === 'POST'){

                $findPatients = $docFindPatients[0]->where([
                    ['name','LIKE',"%{$request->name}%"],
                    ['surname','LIKE',"%{$request->surname}%"],
                    ['patronymic','LIKE',"%{$request->patronymic}%"]
                ])->get();
                return new View('site.serchPatients', [
                    'patients'=>$findPatients
                ]);
            }
            return new View('site.serchPatients', [
                'patients'=>$docFindPatients
            ]);
        }
        if ($request->method === 'POST'){
            $findPatients = Patient::where([
                ['name','LIKE',"%{$request->name}%"],
                ['surname','LIKE',"%{$request->surname}%"],
                ['patronymic','LIKE',"%{$request->patronymic}%"]
            ])->get();
            return new View('site.serchPatients', [
                'patients'=>$findPatients
            ]);
        }
        return new View('site.serchPatients', [
            'patients'=>$patients
        ]);
    }
}