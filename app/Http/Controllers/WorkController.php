<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkStoreRequest;
use App\Http\Requests\WorkUpdateRequest;
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
            'works' => Work::with(['client', 'crew', 'job'])
                            ->orderBy('scheduled_date','desc')
                            ->get(),
        ]);
    }

    public function create(Client $client)
    {
        return view('works.create', [
            'client' => $client,
            'jobs' => Job::onlyEnabled()->orderBy('custom')->get(),
            'crews' => Crew::onlyUsable()->orderBy('name')->get(),
            'operators' => Operator::onlyAvailable()->get(),
            'work' => new Work,
        ]);
    }

    public function store(WorkStoreRequest $request)
    {
        if(! $work = Work::create( $request->validated() ) )
            return back()->with('danger', 'Oops! work not saved');

        $operators_id = ! $work->hasCrew() 
                        ? $request->only('operator_id')
                        : $work->crew->operators->pluck('id')->toArray();

        $work->attachOperators($operators_id);

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

    public function update(WorkUpdateRequest $request, Work $work)
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
