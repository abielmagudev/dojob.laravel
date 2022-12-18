<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Job;
use App\Models\Plugin;

class JobPluginsController extends Controller
{
    /**
     * document.createElement('script')
     * 'script' => File::exists($resource_script) ? File::get($resource_script) : false
     */
    public function create($job_id)
    {   
        if(! $job = Job::find($job_id) )
            return response()->json(['status' => 404], 200);
        
        $views = array();
        
        foreach($job->plugins->load('api') as $plugin)
        {
            array_push($views, [
                'api_plugin' => $plugin->api,
                'rendered' => view("api_plugins/{$plugin->api->space}/create")->with('api_plugin', $plugin->api)->render(),
            ]);
        }
        
        return response()->json([ 
            'views' => $views,
            'status' => 200,
        ], 200);
    }

    public function edit()
    {

    }
}
