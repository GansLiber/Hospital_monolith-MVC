<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $with = ['diagnose'];

    protected $primaryKey = 'id_appointment';
    protected $table = 'appointments';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_patient',
        'id_cabinet',
        'date_time',
        'deleted_at'
    ];

    public function patient(): belongsTo
    {
        return $this->belongsTo(Patient::class, 'id_patient','id_patient');
    }

    public function cabinet(): belongsTo
    {
        return $this->belongsTo(Cabinet::class, 'id_cabinet','id_cabinet');
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function diagnose(): hasOne
    {
        return $this->hasOne(Diagnose::class, 'id_appointment','id_appointment');
    }

}