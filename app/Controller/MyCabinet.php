<?php

namespace Controller;

use Model\Appointment;
use Model\Patient;
use Model\User;
use Src\Request;
use Src\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MyCabinet
{
    public function myCabinet(Request $request): string
    {


//        $user=app()->auth::user();
//        $idDoc = $user->id;
////        var_dump($user);
//        $appointment = Appointment::where('user_id', $idDoc)->get();
//        var_dump($appointment->patient->toarray());
//
//        return 0;


//        $_GET['user_id'] = 22;
//        $appointment = Appointment::where('user_id', $_GET['user_id'])->get();
//        var_dump($appointment[0]->user->toarray());
//


        $name = User::get('name');
        $surname = User::get('surname');
        $patron = User::get('patronymic');
//        $dataBirth = User::get('date_birth');
        $docs = User::getDoctors();
        $myPatients = Patient::getMyPatients();
        return new View('site.myCabinet', [
            'name' => $name,
            'surname' => $surname,
            'patronymic' => $patron,
            'users' => $docs,
            'myPatients'=>$myPatients,
//            'patients'=>$patients
        ]);
    }

}