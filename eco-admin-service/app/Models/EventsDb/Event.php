<?php

namespace App\Models\EventsDb;

use App\Models\Category;
use Clickbar\Magellan\Database\Eloquent\HasPostgisColumns;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static find(string $id)
 */
class Event extends Model
{
    use HasFactory;
    use HasUlids;

    protected $connection = 'events_db';

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
        return User::find($this->user_id);
    }

    public function category(): Category
    {
        return Category::find($this->category_id);
    }

    public function participants(): HasMany
    {
        return $this->hasMany(EventUser::class, 'event_id', 'id');
    }
}
