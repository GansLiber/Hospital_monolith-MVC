<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id_patient',
        'id_user',
        'id_cabinet',
        'date_time',
        'duration',
    ];
}