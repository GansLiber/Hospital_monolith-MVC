<?php

namespace Controller;

use Illuminate\Database\Eloquent\Collection;
use Model\Patient;
use Src\Auth\Auth;
use Src\Request;
use Src\View;

class SerchPatients
{
    public function serchPatients(Request $request): string
    {
        $patients = Patient::all();

        if (Auth::user()->getRole->role === 'doctor') {
            $docFindPatients = Auth::user()
                ->appointments()
                ->with('patient')
                ->distinct()
                ->pluck('id_patient');

            if ($request->method === 'POST') {
                $findPatients = Patient::whereIn('id_patient', $docFindPatients)
                    ->where('name', 'LIKE', "%{$request->name}%")
                    ->where('surname', 'LIKE', "%{$request->surname}%")
                    ->where('patronymic', 'LIKE', "%{$request->patronymic}%")
                    ->get();

                return new View('site.serchPatients', [
                    'patients' => $findPatients
                ]);
            }

            return new View('site.serchPatients', [
                'patients' => Patient::whereIn('id_patient', $docFindPatients)->get()
            ]);
        }

        if ($request->method === 'POST') {
            $findPatients = Patient::where('name', 'LIKE', "%{$request->name}%")
                ->where('surname', 'LIKE', "%{$request->surname}%")
                ->where('patronymic', 'LIKE', "%{$request->patronymic}%")
                ->get();

            return new View('site.serchPatients', [
                'patients' => $findPatients
            ]);
        }

        return new View('site.serchPatients', [
            'patients' => $patients
        ]);
    }
}
