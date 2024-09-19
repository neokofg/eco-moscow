<?php

namespace App\Models;

use App\Controllers\Grpc\Client\AchievementClient;
use App\Controllers\Grpc\Controller\AchievementController;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
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

    protected static function boot()
    {
        parent::boot();
        static::updating(function ($user) {
            $client = App::make(AchievementClient::class);
            $controller = new AchievementController($client);
            if (isset($user->event_points)) {
                if ($user->event_points >= 1 && $user->event_points <= 3) {
                    $controller->addAchievement($user, 'ECONOVATOR');
                } else if ($user->event_points >= 4 && $user->event_points <= 9) {
                    $controller->addAchievement($user, 'ECOEXPERIENCED');
                } else if ($user->event_points >= 10 && $user->event_points <= 19) {
                    $controller->addAchievement($user, 'ECOLEADER');
                } else if ($user->event_points >= 20) {
                    $controller->addAchievement($user, 'ECOEXPERT');
                }
            }
            if (isset($user->participant_points)) {
                if ($user->participant_points >= 50 && $user->participant_points <= 199) {
                    $controller->addAchievement($user, 'ACTIVE');
                } else if ($user->participant_points >= 200 && $user->participant_points <= 499) {
                    $controller->addAchievement($user, 'LEADER');
                } else if ($user->participant_points >= 500) {
                    $controller->addAchievement($user, 'AMBASSADOR');
                }
            }
        });
    }

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
