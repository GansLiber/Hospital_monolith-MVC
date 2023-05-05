<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/admin/signup', [Controller\Site::class, 'signup'])
    ->middleware('auth', 'can:admin');
Route::add([ 'POST'], '/addCab', [Controller\Cabinets::class, 'addCabinet'])
    ->middleware('auth', 'can:admin');
Route::add([ 'POST'], '/addUser', [Controller\Site::class, 'addUser'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/myCabinet', [Controller\MyCabinet::class, 'myCabinet'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/serchPatients', [Controller\SerchPatients::class, 'serchPatients'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/addPatient', [Controller\Patients::class, 'addPatient'])
    ->middleware('auth', 'can:registrator|admin');
Route::add(['GET', 'POST'], '/registrat/addAppointments', [Controller\Appointments::class, 'addAppointment'])
    ->middleware('auth', 'can:registrator|admin');

Route::add(['GET', 'POST'], '/patientCabinet', [Controller\PatientCabinet::class, 'patientCabinet'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/serchAppointment', [Controller\SerchAppointment::class, 'SerchAppointment'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/nick', [Controller\Site::class, 'nick'])
    ->middleware('auth');


Route::add(['GET', 'POST'], '/deleteMe', [Controller\helpers\DeleteMe::class, 'deleteMe'])
    ->middleware('auth');
//Route::add(['GET', 'POST'], '/create', [Controller\Site::class, 'create'])
//    ->middleware('auth', 'can:admin');
//Route::add(['GET', 'POST'], '/update', [Controller\Site::class, 'update'])
//    ->middleware('auth', 'can:admin');