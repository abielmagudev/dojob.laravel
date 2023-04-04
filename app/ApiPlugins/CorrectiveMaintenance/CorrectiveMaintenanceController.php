<?php

namespace App\ApiPlugins\CorrectiveMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApiPlugin;

class CorrectiveMaintenanceController extends Controller
{
    public function create(ApiPlugin $plugin)
    {
        return view('api_plugins/CorrectiveMaintenance/create')->with('api_plugin', $plugin)->render();
    }
}
