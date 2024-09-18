<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteeringUser extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'volunteering_user';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
