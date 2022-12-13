<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Job;
use App\Models\Plugin;

class JobPluginController extends Controller
{
    public function form($job_id)
    {   
        if(! $job = Job::find( $job_id ) )
            return response()->json(['status' => 404], 200);
        
        $forms = array();
        
        foreach($job->plugins->load('api') as $plugin)
        {
            $resource_view = sprintf('api_plugins/%s/%s', $plugin->api->space, 'form');
            $resource_script = sprintf(resource_path('views/api_plugins') . '/%s/%s', $plugin->api->space, 'script.js');
            array_push($forms, [
                'api_plugin_id' => $plugin->api->id,
                'plugin_id' => $plugin->id,
                'html' => view($resource_view)->render(),
                'script' => File::exists($resource_script) ? File::get($resource_script) : false,
            ]);
        }
                  
        return response()->json([ 
            'forms' => $forms,
            'job' => $job,
            'status' => 200,
        ], 200);
    }
}
