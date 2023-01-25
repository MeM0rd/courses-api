<?php

namespace App\Framework\Http\Controllers;

use App\Framework\Models\User;

class HomeController extends Controller
{
    public function status()
    {
        $a = User::whereId(1)->first();

        return $a;
    }
}
