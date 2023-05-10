<?php

namespace Controller;

use Model\Appointment;
use Src\Request;
use Model\Patient;
use Src\View;

class PatientCabinet
{
    public function patientCabinet(Request $request): string
    {
        $patientAppointments = Appointment::where('id_patient',$request->id)->get();
        $patient = Patient::where('id_patient', $request->id)->first();

        if ($request->method ==='POST'){
            $udatePatient = [
                'name'=>$request->get('name'),
                'surname'=>$request->get('surname'),
                'patronymic'=>$request->get('patronymic'),
            ];
            $patient->update($udatePatient);
        }
        return new View('site.patientCabinet', [
            'patient'=>$patient,
            'patientAppointments'=>$patientAppointments
            ]);
    }

    public function patientChangeImg(Request $request): string
    {
//
        if($request->method === 'GET'){
            return (new View())->render('site.avatar');
        }

        if($request->method === 'POST' && !empty($_FILES)){
            if ($_FILES) {
//                var_dump($_SERVER['DOCUMENT_ROOT']);die();
                if (move_uploaded_file($_FILES['filename']['tmp_name'],
                    $_SERVER['DOCUMENT_ROOT'] .'/MCVphpPractice/public/images/' . $_FILES['filename']['name'])) {
                    echo 'Файл успешно загружен';
//                    echo '<pre>'; print_r($_FILES);echo '</pre>'; die();
                    $fileName[] = [
                        'avatar' => '/MCVphpPractice/public/images/' . $_FILES['filename']['name']
                    ];
                    if(Patient::where('id_patient', $request->id)->update($fileName[0])){
                        app()->route->redirect('/patientCabinet?id=' . $request->id);
                    }
                } else {
                    echo 'Ошибка загрузки файла';
                }
            }
        }
        return 0;
    }
}