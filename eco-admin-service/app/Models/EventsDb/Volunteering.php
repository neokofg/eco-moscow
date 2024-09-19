<?php

namespace App\Models\EventsDb;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static find(string $id)
 */
class Volunteering extends Model
{
    use HasFactory;
    use HasUlids;

    protected $connection = 'events_db';

    protected $table = 'volunteerings';

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
        return $this->hasMany(VolunteeringUser::class, 'volunteering_id', 'id');
    }
}
