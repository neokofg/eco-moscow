<?php

namespace App\Models;

use App\Models\MainDb\Category;
use Clickbar\Magellan\Database\Eloquent\HasPostgisColumns;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find(string $id)
 */
class Event extends Model
{
    use HasFactory;
    use HasUlids;
    use HasPostgisColumns;

    protected $table = 'events';

    protected array $postgisColumns = [
        'location' => [
            'type' => 'geometry',
            'srid' => 4326,
        ],
    ];

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
