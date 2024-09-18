<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\HybridRelations;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo as EloquentBelongsTo;

/**
 * @method static create(array $array)
 */
class VideoCommentReply extends Model
{
    use HasFactory;
    use HybridRelations;

    protected $connection = 'mongodb';

    protected $table = 'post_comments';

    protected $guarded = [
        '_id'
    ];

    public function videoComment(): BelongsTo
    {
        return $this->belongsTo(VideoComment::class, 'video_comment_id', '_id');
    }

    public function user(): EloquentBelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function likes(): Collection
    {
        return Like::where('commentable_type', '=', VideoCommentReply::class)
            ->where('commentable_id','=', $this->id)->get();
    }

    public function dislikes(): Collection
    {
        return Dislike::where('commentable_type', '=', VideoCommentReply::class)
            ->where('commentable_id','=', $this->id)->get();
    }
}
