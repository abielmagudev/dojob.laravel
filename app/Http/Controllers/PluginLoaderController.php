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
    public function form($plugin, $type, $parameters = [])
    {
        $classname_api_plugin = implode('\\', ['App\ApiPlugins', "{$plugin->slug}Controller"]);
        
        if(! class_exists($classname_api_plugin) ||! method_exists($classname_api_plugin, $type) )
            return null;

        $controller = app($classname_api_plugin, $plugin);

        return call_user_func([$controller, $type], $parameters);
    }

    public function forms($job_id, $type)
    {
        $plugins = ApiPlugin::whereIn('id', JobPlugin::where('job_id', $job_id)->get('plugin_id'))->get();
        $forms = [];

        foreach($plugins as $plugin)
        {
            if( $form = $this->form($plugin, $type) )
                array_push($forms, $form);
        }
        
        return response()->json($forms, 200);
    }



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
}
