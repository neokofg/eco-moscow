<?php

namespace App\Models;

use App\Models\PostDb\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;

/**
 * @method static where(string $string, string $string1, string $video_id)
 * @method static create(array $array)
 */
class VideoComment extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $table = 'video_comments';

    protected $guarded = [
        '_id'
    ];

    public function replies(): HasMany
    {
        return $this->hasMany(VideoCommentReply::class, 'video_comment_id', '_id');
    }

    public function likes(): Collection
    {
        return Like::where('commentable_type', '=', VideoComment::class)
            ->where('commentable_id','=', $this->id)->get();
    }

    public function dislikes(): Collection
    {
        return Dislike::where('commentable_type', '=', VideoComment::class)
            ->where('commentable_id','=', $this->id)->get();
    }

    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class, 'video_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
