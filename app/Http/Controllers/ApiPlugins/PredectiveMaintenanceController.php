<?php

namespace App\Http\Controllers\ApiPlugins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApiPlugin;

class PredectiveMaintenanceController extends Controller
{
    public function create(ApiPlugin $plugin)
    {
        return view('api_plugins/PredectiveMaintenance/create')->with('api_plugin', $plugin)->render();
    }
}
