<?php

namespace App\Models\PostDb;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Video extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'videos';

    protected $fillable = [];

    public function user(): User
    {
        return User::find($this->user_id);
    }
}
