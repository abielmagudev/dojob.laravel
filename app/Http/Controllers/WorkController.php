<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkStoreRequest;
use App\Http\Requests\WorkUpdateRequest;
use App\Models\Client;
use App\Models\Crew;
use App\Models\Intermediary;
use App\Models\Job;
use App\Models\Member;
use App\Models\Work;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::with(['client', 'crew', 'job'])->orderByDesc('scheduled_date')->get();

        $today = $works->where('scheduled_date', date('Y-m-d'));

        return view('works.index', compact('works', 'today'));
    }

    public function create(Client $client)
    {
        $jobs = Job::onlyEnabled()->orderBy('name')->get();

        return view('works.create', [
            'client' => $client,
            'intermediaries' => Intermediary::onlyAvailable()->orderBy('name')->get(),
            'non_custom_jobs' => $jobs->where('is_custom', false),
            'jobs' => $jobs->where('is_custom', true),
            'crews' => Crew::onlyUsable()->orderBy('name')->get(),
            'members' => Member::onlyAvailable()->get(),
            'work' => new Work,
        ]);
    }

    public function store(WorkStoreRequest $request)
    {
        if(! $work = Work::create( $request->validated() ) )
            return back()->with('danger', 'Oops! work not saved');

        $members_id = ! $work->hasCrew() 
                        ? $request->only('member_id')
                        : $work->crew->membersId();

        $work->attachMembers($members_id);

        return redirect()->route('works.index')->with('success', "{$work->job_name}");
    }

    public function show(Work $work)
    {
        return view('works.show')->with('work', $work);
    }

    public function edit(Work $work)
    {
        return view('works.edit', [
            'intermediaries' => Intermediary::onlyAvailable()->orderBy('name')->get(),
            'crews' => Crew::onlyUsable()->orderBy('name')->get(),
            'members' => Member::onlyAvailable()->orderBy('name')->get(),
            'work' => $work,
        ]);
    }

    public function update(WorkUpdateRequest $request, Work $work)
    {
        if(! $work->fill($request->validated())->save() )
            return back()->with('danger', 'Oops! Work not updated');

        if( array_key_exists('crew_id', $work->getChanges()) && $work->hasCrew() )
            $work->attachMembers( $work->crew->membersId() );

        if( array_key_exists('member_id', $request->validated()) &&! $work->hasCrew() )
            $work->attachMembers( $request->only('member_id') );

        return redirect()->route('works.edit', $work)->with('success', "{$work->job_name} work #{$work->id} was updated");
    }

    public function destroy(Work $work)
    {
        if(! $work->delete() )
            return back()->with('danger', 'Oops! work not deleted');

        return redirect()->route('works.index')->with('success', "{$work->job_name} work deleted");
    }

    public function warranties(Work $work)
    {
        return view('works.warranties')->with('work', $work);
    }
}
