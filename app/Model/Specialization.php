<?php

namespace Controller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Specialization extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $primaryKey = 'id_specialization';
}