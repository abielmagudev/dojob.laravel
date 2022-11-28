<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPluginRequest;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Plugin;
use App\Models\Work;
use Illuminate\Http\Request;


class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index')->with('jobs', Job::withCount(['works','plugins'])->orderBy('name')->simplePaginate(16));
    }

    public function create()
    {
        return view('jobs.create')->with('job', new Job);
    }

    public function store(JobRequest $request)
    {
        if(! $job = Job::create( $request->validated() ) )
            return back()->with('danger', 'Oops! job not saved');
        
        return redirect()->route('jobs.index')->with('success', "{$job->name} job saved");
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job->load('plugins'),
            'plugins' => Plugin::with('api')->get(),
            'works' => Work::with('client')->where('job_id', $job->id)->take(15)->get(),
        ]);
    }

    public function edit(Job $job)
    {
        $job->loadCount(['works','plugins']);
        return view('jobs.edit')->with('job', $job);
    }

    public function update(JobRequest $request, Job $job)
    {
        if(! $job->fill( $request->validated() )->save() )
            return back()->with('danger', 'Oops! job not updated');
        
        return redirect()->route('jobs.edit', $job)->with('success', "{$job->name} job updated");
    }

    public function destroy(Job $job)
    {
        if(! $job->delete() )
            return back()->with('danger', 'Oops! job not deleted');
        
        return redirect()->route('jobs.index')->with('success', "{$job->name} job deleted");
    }

    public function connectPlugins(JobPluginRequest $request, Job $job)
    {
        $job->syncPlugins($request->get('plugins', []));
        return redirect()->route('jobs.show', $job)->with('success', "Plugins of {$job->name} job updated");
    }

    public function updatePlugins(JobPluginRequest $request, Job $job)
    {
        $job->plugins->each(function ($plugin) use ($request) {
            $plugin->pivot->is_enabled = (int) in_array($plugin->id, $request->get('plugins', []));
            $plugin->pivot->save();
        });

        return redirect()->route('jobs.show', $job)->with('success', "Plugin {$job->name} updated");
    }
}
