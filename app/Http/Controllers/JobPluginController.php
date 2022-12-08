<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobPluginController extends Controller
{
    public function form(Request $request)
    {
        return response()->json(['status' => 'ok', 'job_id' => $request->job], 200);

        return json_encode(['status' => 200]);
    }
}
