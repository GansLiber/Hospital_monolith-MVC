<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout'])->middleware('auth');
//Route::add('GET', '/nick', [Controller\Site::class, 'nick'])->middleware('auth');
Route::add('GET', '/cabinet', [Controller\Site::class, 'cabinet'])->middleware('auth');
Route::add('GET', '/patients', [Controller\Site::class, 'patients'])->middleware('auth');
Route::add(['GET', 'POST'], '/addPatient', [Controller\Patients::class, 'addPatient'])->middleware('auth');

Route::add(['GET', 'POST'], '/nick', [Controller\Site::class, 'nick'])->middleware('auth', 'can:admin');
//Route::add(['GET', 'POST'], '/create', [Controller\Site::class, 'create'])
//    ->middleware('auth', 'can:admin');
//Route::add(['GET', 'POST'], '/update', [Controller\Site::class, 'update'])
//    ->middleware('auth', 'can:admin');