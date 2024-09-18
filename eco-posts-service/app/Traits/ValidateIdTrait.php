<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait ValidateIdTrait
{
    /**
     * @param string $id
     * @return void
     */
    public function validatePostId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|ulid|exists:posts,id'
        ])->validate();
    }

    /**
     * @param string $id
     * @return void
     */
    public function validateVideoId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|ulid|exists:videos,id'
        ])->validate();
    }

    /**
     * @param string $id
     * @return void
     */
    public function validateNewsId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|ulid|exists:newses,id'
        ])->validate();
    }

}
