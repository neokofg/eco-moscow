<?php

namespace App\Controllers;

use App\Helpers\JsonPresenter;

readonly class Controller
{
    public JsonPresenter $presenter;
    public function __construct()
    {
        $this->presenter = new JsonPresenter();
    }
}
