<?php

namespace Controller;

use Src\View;

class SerchAppointment
{
    public function serchAppointment(): string
    {
        return new View('site.serchAppointment', ['message' => 'hello working']);
    }
}