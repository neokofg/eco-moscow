<?php

namespace App\Models;

use App\Models\MainDb\Category;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'newses';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function category(): Category
    {
        return Category::find($this->category_id);
    }
}
