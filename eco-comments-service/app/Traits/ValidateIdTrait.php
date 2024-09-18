<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait ValidateIdTrait
{
    /**
     * @param string $id
     * @return void
     */
    public function validatePostCommentId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|exists:mongodb.post_comments,_id'
        ])->validate();
    }

    /**
     * @param string $id
     * @return void
     */
    public function validateVideoCommentId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|exists:mongodb.video_comments,_id'
        ])->validate();
    }
    /**
     * @param string $id
     * @return void
     */
    public function validatePostCommentReplyId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|exists:mongodb.post_comment_replies,_id'
        ])->validate();
    }

    /**
     * @param string $id
     * @return void
     */
    public function validateVideoCommentReplyId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|exists:mongodb.video_comment_replies,_id'
        ])->validate();
    }
}
