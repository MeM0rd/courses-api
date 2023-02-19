<?php

namespace App\Framework\Http\Controllers;

use App\Framework\Models\User;

class HomeController extends Controller
{
    public function status()
    {
        return User::whereId(1) ? User::whereId(1) : 'DB is emptu';
    }
}
