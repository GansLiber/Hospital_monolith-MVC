<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $primaryKey = 'id_specialization';
    protected $fillable = [
        'id_specialization',
        'specialization',
        'experience',
    ];
}