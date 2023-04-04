<?php

namespace App\ApiPlugins\PreventiveMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApiPlugin;

class PreventiveMaintenanceController extends Controller
{
    public function create(ApiPlugin $plugin)
    {
        return view('api_plugins/PreventiveMaintenance/create')->with('api_plugin', $plugin)->render();
    }
}
