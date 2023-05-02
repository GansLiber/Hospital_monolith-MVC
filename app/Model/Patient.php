<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Src\Auth\IdentityInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_patient';
    protected $table = 'patients';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'date_birth'
    ];

    public static function getPatients()
    {
        return self::all();
    }
        public static function getMyPatients()
    {
        $idDoc=app()->auth::user()->id;
        return Appointment::
            join('patients', 'appointments.id_patient', '=', 'patients.id_patient')
            ->join('users', 'appointments.id_user', '=', 'users.id')
            ->where('users.id', '=', $idDoc)
            ->select('patients.*','appointments.date_time')
            ->get();
    }
}