<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $id
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

    public function events(): HasMany
    {
        return $this->hasMany(EventUser::class, 'user_id', 'id');
    }

    public function promotions(): HasMany
    {
        return $this->hasMany(PromotionUser::class, 'user_id', 'id');
    }

    public function competitions(): HasMany
    {
        return $this->hasMany(CompetitionUser::class, 'user_id', 'id');
    }

    public function volunteerings(): HasMany
    {
        return $this->hasMany(VolunteeringUser::class, 'user_id', 'id');
    }

    public function marathons(): HasMany
    {
        return $this->hasMany(Marathon::class, 'user_id', 'id');
    }
}
