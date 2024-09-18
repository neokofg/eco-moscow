<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\HybridRelations;
use MongoDB\Laravel\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(array $conditions)
 */
class Dislike extends Model
{
    use HasFactory;
    use HybridRelations;

    protected $connection = 'mongodb';

    protected $table = 'post_comments';

    protected $guarded = [
        '_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
