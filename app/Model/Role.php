<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    public $timestamps = false;

    protected $primaryKey = 'id_role';

    protected $fillable = [
        'id_role',
        'role',
        'description'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_role', 'id_role');
    }
}