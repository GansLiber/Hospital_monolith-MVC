<?php

namespace Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class, 'id_specialization', 'id_specialization');
    }


    //Выборка пользователя по первичному ключу
    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    public function hasRole($roles): bool
    {
        return in_array($this->getRole->role, $roles);
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

    public static function getAll()
    {
        return self::all();
    }

    public function getMyPatients()
    {
        return $this->belongsToMany(Patient::class,
            'appointments',
            'id_user',
            'id_patient');
    }
}
