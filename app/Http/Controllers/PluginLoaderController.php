<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Job;
use App\Models\JobPlugin;
use App\Models\ApiPlugin;
use App\Models\Plugin;

class PluginLoaderController extends Controller
{
    public function create($job_id)
    {        
        $plugins = ApiPlugin::whereIn('id', JobPlugin::where('job_id', $job_id)->get('plugin_id'))->get();
        $forms = [];

        foreach($plugins as $plugin)
        {
            $classname = implode('\\', [__NAMESPACE__, 'ApiPlugins', "{$plugin->slug}Controller"]);

            if(! class_exists($classname) ||! method_exists($classname, 'create') )
                continue;

            array_push($forms, [app($classname)->create($plugin)]);
        }
        
        return response()->json($forms, 200);
    }

    /*

    public static function generateClassnameApiPluginController($classname)
    {
        return implode('\\', [
            __NAMESPACE__,
            'ApiPlugins',
            "{$classname}Controller",
        ]);
    }

    public static function generatePathApiPluginView($spacename, $viewname)
    {
        return implode('/', [
            'api_plugins',
            $spacename,
            $viewname,
        ]);
    }

    private function run($classname, $method)
    {
        $classname_controller = self::generateClassnameApiPluginController($classname);

        if(! class_exists($classname_controller) ||! method_exists($classname_controller, $method)  )
            return;

        return call_user_func([new $classname_controller, $method], request());
    }

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
    */
}
