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
        $data = $request->only(['numberCab', 'floor']);
        if ($request->method === 'POST' && Cabinet::create($data)) {
            return new View('site.signup', ['message' => 'Кабинет добавлен']);
        }
        return new View('site.signup');
    }
}