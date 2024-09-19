<?php

namespace App\Controllers;

use App\Models\UserModeration;

final readonly class ApproveController
{
    public function approve(string $id)
    {
        $moderation = UserModeration::find($id);
        $moderation->status = 'approved';
        $moderation->save();

        return to_route('accounts.view');
    }
}
