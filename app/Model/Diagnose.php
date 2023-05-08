<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Diagnose extends Model
{
    use HasFactory;

//    protected $with = ['appointment'];
    public $table = 'diagnoses';
    protected $primaryKey = 'id_diagnoses';
    public $timestamps = false;
    protected $fillable=[
        'id_diagnoses',
        'disease',
        'id_appointment'
    ];

    public function appointment(): BelongsTo
    {
        return $this->BelongsTo(Appointment::class, 'id_appointment','id_appointment');
    }
}