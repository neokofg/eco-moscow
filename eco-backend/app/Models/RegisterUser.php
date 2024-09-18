<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @property string $code
 * @property string $name
 * @property string $email
 * @property string $password
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
