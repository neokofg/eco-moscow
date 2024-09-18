<?php

namespace App\Helpers;

use App\Dto\Dto;

interface RestRequest
{
    /**
     * @return array
     */
    public function rules(): array;

    /**
     * @return Dto
     */
    public function getDto(): Dto;
}
