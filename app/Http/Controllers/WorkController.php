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
                        : $work->crew->operatorsId();

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
            'crews' => Crew::onlyUsable()->orderBy('name')->get(),
            'operators' => Operator::onlyAvailable()->orderBy('name')->get(),
            'operator_unavailable' => $work->operators()->firstWhere('available', false),
            'work' => $work,
        ]);
    }

    public function update(WorkUpdateRequest $request, Work $work)
    {
        if(! $work->fill($request->validated())->save() )
            return back()->with('danger', 'Oops! Work not updated');

        if( array_key_exists('crew_id', $work->getChanges()) && $work->hasCrew() )
            $work->attachOperators( $work->crew->operatorsId() );

        if( array_key_exists('operator_id', $request->validated()) &&! $work->hasCrew() )
            $work->attachOperators( $request->only('operator_id') );

        return redirect()->route('works.edit', $work)->with('success', "{$work->job_name} work #{$work->id} was updated");
    }

    public function destroy(Work $work)
    {
        if(! $work->delete() )
            return back()->with('danger', 'Oops! work not deleted');

        return redirect()->route('works.index')->with('success', "{$work->job_name} work deleted");
    }
}
