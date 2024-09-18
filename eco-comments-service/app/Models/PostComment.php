<?php

namespace App\Models;

use App\Models\PostDb\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\HybridRelations;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, string $post_id)
 */
class PostComment extends Model
{
    use HasFactory;
    use HybridRelations;

    protected $connection = 'mongodb';

    protected $table = 'post_comments';

    protected $guarded = [
        '_id'
    ];

    public function replies(): HasMany
    {
        return $this->hasMany(PostCommentReply::class, 'post_comment_id', '_id');
    }

    public function likes(): Collection
    {
        return Like::where('commentable_type', '=', PostComment::class)
            ->where('commentable_id','=', $this->id)->get();
    }

    public function dislikes(): Collection
    {
        return Dislike::where('commentable_type', '=', PostComment::class)
            ->where('commentable_id','=', $this->id)->get();
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
