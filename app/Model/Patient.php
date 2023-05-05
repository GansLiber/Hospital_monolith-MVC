<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'id_patient',
        'name',
        'surname',
        'patronymic',
        'date_birth'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id_patient', 'id_patient');
    }
}