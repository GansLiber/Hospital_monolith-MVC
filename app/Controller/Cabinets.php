<?php

namespace Controller;

use Model\Cabinet;
use Model\Patient;
use Src\Request;
use Src\View;

class Cabinets
{
    public function addCabinet(Request $request): string
    {
        if ($request->method === 'POST' && Cabinet::create($request->all())) {
            return new View('site.signup', ['message' => 'Кабинет добавлен']);
        }
        return new View('site.signup');
    }
}