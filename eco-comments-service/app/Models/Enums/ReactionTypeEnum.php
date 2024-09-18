<?php

namespace App\Models\Enums;

enum ReactionTypeEnum: string
{
    case Like = 'like';
    case Dislike = 'dislike';
}
