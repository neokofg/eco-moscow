<?php

namespace App\Models\PostsDb;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static findOrFail(string $id)
 */
class Note extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'notes';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function user(): User
    {
        return User::find($this->user_id);
    }
}
