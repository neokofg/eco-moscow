<?php

namespace App\Models;

use App\Controllers\Grpc\Clients\AchievementClient;
use App\Controllers\Grpc\Controllers\AchievementController;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static create(string[] $array)
 * @method static firstOrCreate(string[] $array, array $array1)
 * @method static findOrFail(int $userId)
 * @property string $password
 * @property string $id
 * @property UserEducation $userEducation
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;
    use HasUlids;

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            UserEducation::create([
                'user_id' => $user->id
            ]);
        });

        static::updated(function ($user) {
            if ($user->isFilled() && !$user->is_was_filled) {
                $client = App::make(AchievementClient::class);
                $controller = new AchievementController($client);
                if ($controller->addAchievement($user, 'PROFILE_FILLED')) {
                    $user->update([
                        'is_was_filled' => true
                    ]);
                }
            }
        });
    }

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
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

    public function userEducation(): HasOne
    {
        return $this->hasOne(UserEducation::class, 'user_id', 'id');
    }

    public function achievements(): BelongsToMany
    {
        return $this->belongsToMany(Achievement::class, 'user_achievement');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'user_category');
    }

    public function isFilled(): bool
    {
        $fields = [
            'name',
            'surname',
            'birthdate',
            'about'
        ];
        $totalFields = count($fields);
        $filledFields = 0;

        foreach ($fields as $field) {
            if (!empty($this->$field)) {
                $filledFields++;
            }
        }

        return $totalFields == $filledFields;
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
