<?php

namespace App\Helpers;

interface RestRequest
{
    /**
     * @return array
     */
    public function rules(): array;
}
