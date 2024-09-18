<?php

namespace App\Models;

use App\Models\MainDb\Category;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find(string $id)
 */
class Marathon extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'events';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function user(): User
    {
        return User::find($this->id);
    }

    public function category(): Category
    {
        return Category::find($this->id);
    }
}
