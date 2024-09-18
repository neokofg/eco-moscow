<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static where(string $string, string $key)
 */
class Achievement extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'achievements';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_achievement');
    }
}
