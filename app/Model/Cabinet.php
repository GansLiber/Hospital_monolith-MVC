<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=[
        'numberCab',
        'floor'
    ];

    public static function getAllCabinets(){
        return self::all();
    }
}