<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $primaryKey = 'id_appointment';
    use HasFactory;

    protected $table = 'appointments';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_patient',
        'id_cabinet',
        'date_time',
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


//    public static function getMyPatients()
//    {
//        return Appointment::
//        join('patients', 'appointments.id_patient', '=', 'patients.id_patient')
//            ->join('users', 'appointments.id_user', '=', 'users.id')
//            ->join('cabinets', 'appointments.id_cabinet', '=', 'cabinets.id_cabinet')
//            ->select('patients.name', 'patients.surname', 'appointments.date_time', 'cabinets.cabinet', 'user.name', 'user.surname')
//            ->get();
//    }
// не понял
}