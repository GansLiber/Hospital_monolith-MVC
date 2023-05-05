<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diagnose extends Model
{
    use HasFactory;

    public $table = 'diagnoses';
    protected $primaryKey = 'id_diagnoses';
    public $timestamps = false;
    protected $fillable=[
        'id_diagnoses',
        'disease',
        'id_appointment'
    ];

    public function appointment(): belongsTo
    {
        return $this->belongsTo(Appointment::class, 'id_appointment','id_appointment');
    }
}