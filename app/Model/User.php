<?php

namespace Model;


use Controller\Specialization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\Auth\IdentityInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model implements IdentityInterface
{
    use HasFactory;

    protected $table = 'users';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'login',
        'password',
        'id_role',
        'position',
        'id_specialization',
        'date_birth'
    ];


    protected static function booted()
    {
        static::created(function ($user) {
            $user->password = md5($user->password);
            $user->save();
        });
    }

    public function getRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function getSpecialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class, 'id_specialization', 'id_specialization');
    }

//    public static function getDoctors()
//    {
//        return self::join('roles','users.id_role', '=', 'roles.id_role')
//            ->where('roles.role', '=', 'doctor')
//            ->get();
//    }

    public static function getDoctors()
    {
        return self::join('roles', 'users.id_role', '=', 'roles.id_role')
            ->join('specializations', 'users.id_specialization', '=', 'specializations.id_specialization')
            ->where('roles.role', '=', 'doctor')
            ->get(['users.*', 'specializations.specialization']);
    }

    //Выборка пользователя по первичному ключу
    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    public function hasRole($roles): bool
    {
        return in_array($this->role->role, $roles);
    }

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id;
    }

    //Возврат аутентифицированного пользователя
    public function attemptIdentity(array $credentials)
    {
        return self::where([
            'login' => $credentials['login'],
            'password' => md5($credentials['password']
            )])->first();
    }

    public function getAll()
    {
        return self::all();
    }

    public function getPatients()
    {
        return $this->belongsToMany(Patient::class,
            'appointments',
            'id_user',
            'id_patient');
    }
}
