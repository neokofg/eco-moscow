<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo as EloquentBelongsTo;
use MongoDB\Laravel\Eloquent\HybridRelations;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @method static create(array $array)
 */
class PostCommentReply extends Model
{
    use HasFactory;
    use HybridRelations;

    protected $connection = 'mongodb';

    protected $table = 'post_comment_replies';

    protected $guarded = [
        '_id'
    ];

    public function postComment(): BelongsTo
    {
        return $this->belongsTo(PostComment::class, 'post_comment_id', '_id');
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
