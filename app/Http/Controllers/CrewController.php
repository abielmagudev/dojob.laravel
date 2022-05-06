<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Http\Requests\CrewRequest;

class CrewController extends Controller
{
    public function index()
    {
        return view('crews.index')->with('crews', Crew::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('crews.create')->with('crew', new Crew);
    }

    public function store(CrewRequest $request)
    {
        if(! $crew = Crew::create($request->validated()) )
            return back()->with('danger', 'Ups! crew not saved');

        return redirect()->route('crews.index')->with('success', "{$crew->name} crew saved");
    }

    public function show(Crew $crew)
    {
        return view('crews.show')->with('crew', $crew);
    }

    public function edit(Crew $crew)
    {
        return view('crews.edit')->with('crew', $crew);
    }

    public function update(CrewRequest $request, Crew $crew)
    {
        if(! $crew->fill($request->validated())->save() )
            return back()->with('danger', 'Ups! crew not updated');

        return redirect()->route('crews.edit', $crew)->with('success', "{$crew->name} crew updated");
    }

    public function destroy(Crew $crew)
    {
        if(! $crew->delete() )
            return back()->with('danger', 'Ups! crew not deleted');

        return redirect()->route('crews.index')->with('success', "{$crew->name} crew deleted");
    }
}
