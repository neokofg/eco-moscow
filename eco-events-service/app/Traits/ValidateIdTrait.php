<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait ValidateIdTrait
{
    /**
     * @param string $id
     * @return void
     */
    public function validateEventId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|ulid|exists:events,id'
        ])->validate();
    }

    /**
     * @param string $id
     * @return void
     */
    public function validatePromotionId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|ulid|exists:promotions,id'
        ])->validate();
    }

    /**
     * @param string $id
     * @return void
     */
    public function validateCompetitionId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|ulid|exists:competitions,id'
        ])->validate();
    }

    /**
     * @param string $id
     * @return void
     */
    public function validateVolunteeringId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|ulid|exists:volunteerings,id'
        ])->validate();
    }

    /**
     * @param string $id
     * @return void
     */
    public function validateMarathonId(string $id): void
    {
        Validator::make(['id' => $id], [
            'id' => 'required|ulid|exists:marathons,id'
        ])->validate();
    }
}
