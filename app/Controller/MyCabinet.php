<?php

namespace Controller;

use Src\Request;
use Src\View;

class MyCabinet
{
    public function myCabinet(): string
    {
        $user = app()->auth::user();
        $myPatients = $user->getMyPatients()
            ->wherePivot('id_user',$user->id)
            ->withPivot('date_time')
            ->get();

        return new View('site.myCabinet', [
            'myPatients'=>$myPatients,
        ]);
    }

}