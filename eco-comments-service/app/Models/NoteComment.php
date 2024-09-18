<?php

namespace App\Models;

use App\Models\PostDb\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\HybridRelations;
use MongoDB\Laravel\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, string $note_id)
 */
class NoteComment extends Model
{
    use HasFactory;
    use HybridRelations;

    protected $connection = 'mongodb';

    protected $table = 'note_comments';

    protected $guarded = [
        '_id'
    ];

    public function replies(): HasMany
    {
        return $this->hasMany(NoteCommentReply::class, 'note_comment_id', '_id');
    }

    public function likes(): Collection
    {
        return Like::where('commentable_type', '=', NoteComment::class)
            ->where('commentable_id','=', $this->id)->get();
    }

    public function dislikes(): Collection
    {
        return Dislike::where('commentable_type', '=', NoteComment::class)
            ->where('commentable_id','=', $this->id)->get();
    }

    public function note(): BelongsTo
    {
        return $this->belongsTo(Note::class, 'note_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
