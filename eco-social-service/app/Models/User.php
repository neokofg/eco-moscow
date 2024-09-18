<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static findOrFail(string $id)
 * @method static orderBy(string $string)
 */
class User extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    use Notifiable;
    use HasUlids;

    protected $connection = 'main_db';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function id(): string
    {
        return $this->id;
    }

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_subscriptions', 'user_id', 'subscribed_user_id', 'id', 'id');
    }

    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_subscriptions', 'subscribed_user_id', 'user_id', 'id', 'id');
    }
}
