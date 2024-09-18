<?php

namespace App\Models\PostDb;

use App\Models\MainDb\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'posts';

    protected $fillable = [];

    public function user(): User
    {
        return User::find($this->user_id);
    }
}
