<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\Work;
use App\Models\Client;
use App\Models\Job;
use App\Models\Crew;
use App\Models\Operator;

class WorkController extends Controller
{
    public function index()
    {
        return view('works.index', [
            'works' => Work::with(['client', 'crew', 'job'])->orderBy('scheduled_date','desc')->get(),
        ]);
    }

    public function create(Client $client)
    {
        return view('works.create', [
            'client' => $client,
            'crews' => Crew::allEnabled()->sortBy('name'),
            'jobs' => Job::allEnabled()->sortBy('custom'),
            'operators' => Operator::allAvailable(),
            'work' => new Work,
        ]);
    }

    public function store(WorkRequest $request)
    {
        if(! $work = Work::create( $request->validated() ) )
            return back()->with('danger', 'Oops! work not saved');

        $work->attachOperators($request->get('operator_id'));

        return redirect()->route('works.index')->with('success', "{$work->job_name}");
    }

    public function show(Work $work)
    {
        return view('works.show')->with('work', $work);
    }

    public function edit(Work $work)
    {
        return view('works.edit', [
            'crews' => Crew::allEnabled()->sortBy('name'),
            'operators' => Operator::allAvailable(),
            'work' => $work,
        ]);
    }

    public function update(WorkRequest $request, Work $work)
    {
        return $request->validated();
    }

    public function destroy(Work $work)
    {
        if(! $work->delete() )
            return back()->with('danger', 'Oops! work not deleted');

        return redirect()->route('works.index')->with('success', "{$work->job_name} work deleted");
    }
}
