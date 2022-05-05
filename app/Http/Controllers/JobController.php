<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\JobRequest;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index')->with('jobs', Job::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('jobs.create')->with('job', new Job);
    }

    public function store(JobRequest $request)
    {
        if(! $job = Job::create( $request->validated() ) )
            return back()->with('danger', 'Ups! job not created');
        
        return redirect()->route('jobs.index')->with('success', "{$job->name} job created");
    }

    public function show(Job $job)
    {
        return view('jobs.show')->with('job', $job);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit')->with('job', $job);
    }

    public function update(JobRequest $request, Job $job)
    {
        if(! $job->fill( $request->validated() )->save() )
            return back()->with('danger', 'Ups! job not updated');
        
        return redirect()->route('jobs.edit', $job)->with('success', "{$job->name} job updated");
    }

    public function destroy(Job $job)
    {
        if(! $job->delete() )
            return back()->with('danger', 'Ups! job not deleted');
        
        return redirect()->route('jobs.index')->with('success', "{$job->name} job deleted");
    }
}
