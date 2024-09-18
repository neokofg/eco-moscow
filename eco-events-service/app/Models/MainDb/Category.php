<?php

namespace App\Models\MainDb;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasUlids;

    protected $connection = 'main_db';

    protected $table = 'categories';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
