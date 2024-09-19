<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 */
class UserModeration extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'user_moderation';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if(isset($model->status)) {
                if($model->status == 'approved') {
                    $user = $model->user;
                    $user->update([
                        'is_organizer' => true,
                        'company' => $model->company,
                        'inn' => $model->inn,
                        'ogrn' => $model->ogrn,
                        'kpp' => $model->kpp,
                        'okpo' => $model->okpo,
                    ]);
                }
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
