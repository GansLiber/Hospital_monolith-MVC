<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;
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

    public static function getAllAppointments()
    {
        return self::all();
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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