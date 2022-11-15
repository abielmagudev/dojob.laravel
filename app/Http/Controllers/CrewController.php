<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrewRequest;
use App\Http\Requests\CrewMembersRequest;
use App\Models\Crew;
use App\Models\Member;

class CrewController extends Controller
{
    public function index()
    {
        return view('crews.index')->with('crews', Crew::withCount('works')->orderBy('id','desc')->get());
    }

    public function create()
    {
        return view('crews.create')->with('crew', new Crew);
    }

    public function store(CrewRequest $request)
    {
        if(! $crew = Crew::create($request->validated()) )
            return back()->with('danger', 'Oops! crew not saved');

        return redirect()->route('crews.index')->with('success', "{$crew->name} crew saved");
    }

    public function show(Crew $crew)
    {
        return view('crews.show', [
            'crew' => $crew,
            'members' => Member::onlyAvailable()->get(),
        ]);
    }

    public function edit(Crew $crew)
    {
        return view('crews.edit')->with('crew', $crew);
    }

    public function update(CrewRequest $request, Crew $crew)
    {
        if(! $crew->fill($request->validated())->save() )
            return back()->with('danger', 'Oops! crew not updated');

        if( $crew->isDisabled() )
            $crew->removeMembers();
            
        return redirect()->route('crews.edit', $crew)->with('success', "{$crew->name} crew updated");
    }

    public function updateMembers(CrewMembersRequest $request, Crew $crew)
    {
        $crew->removeMembers();

        if( $request->filled('members') )
            $crew->attachMembers($request->members);

        return redirect()->route('crews.show', $crew)->with('success', 'Members updated');
    }

    public function destroy(Crew $crew)
    {
        if(! $crew->delete() )
            return back()->with('danger', 'Oops! crew not deleted');

        $crew->removeMembers();

        return redirect()->route('crews.index')->with('success', "{$crew->name} crew deleted");
    }
}
