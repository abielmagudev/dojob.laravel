<?php

namespace App\Http\Controllers\ApiPlugins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApiPlugin;

class AtticInsulationController extends Controller
{
    public function create(ApiPlugin $plugin)
    {
        return view('api_plugins/AtticInsulation/create')->with('api_plugin', $plugin)->render();
    }
}
