<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static updateOrCreate(array $array, array $array1)
 * @method static where(string $string, string $string1, string $token)
 * @property string $token
 * @property string $new_email
 */
class UserChangeEmail extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'user_change_emails';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
