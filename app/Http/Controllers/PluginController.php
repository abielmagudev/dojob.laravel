<?php

namespace App\Http\Controllers;

use App\Models\Plugin;
use App\Models\ApiPlugin;
use App\Models\ApiCatalog;
use App\Http\Requests\PluginStoreRequest;
use App\Http\Requests\PluginUpdateRequest;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function index(Request $request)
    {
        return view('plugins.index', [
            'api_catalogs' => ApiCatalog::all(),
            'api_plugins' => ApiPlugin::with('catalog')->get(),
            'plugins' => Plugin::all(),
        ]);
    }

    public function store(PluginStoreRequest $request)
    {
        if(! $plugin = Plugin::create($request->validated()) )
            return back()->with('danger', 'Oops! plugin not pursached');

        return redirect()->route('plugins.index')->with('success', "{$plugin->name} plugin pursached");
    }

    public function edit(Plugin $plugin)
    {
        return view('plugins.edit')->with('plugin', $plugin);
    }

    public function update(PluginUpdateRequest $request, Plugin $plugin)
    {
        if(! $plugin->fill($request->validated())->save() )
            return back()->with('danger', 'Oops! plugin not updated');

        return redirect()->route('plugins.edit', $plugin)->with('success', 'Plugin updated');
    }

    public function destroy(Plugin $plugin)
    {
        if(! $plugin->delete() )
            return back()->with('danger', 'Oops! plugin not deleted');

        return redirect()->route('plugins.index')->with('success', "{$plugin->name} deleted");
    }
}
