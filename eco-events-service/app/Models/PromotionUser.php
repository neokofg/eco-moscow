<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class PromotionUser extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'promotion_user';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
