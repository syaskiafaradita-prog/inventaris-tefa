<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Controller utama Laravel.
 * Semua controller lain akan mewarisi class ini.
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
