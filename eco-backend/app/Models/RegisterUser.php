<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $token)
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $surname
 * @property string $token
 */
class RegisterUser extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'register_users';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
