<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Http\Requests\SkillRequest;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return view('skills.index')->with('skills', Skill::withCount('members')->orderBy('name')->get());
    }

    public function create()
    {
        return view('skills.create')->with('skill', new Skill);
    }

    public function store(SkillRequest $request)
    {
        if(! $skill = Skill::create($request->validated()) )
            return back()->with('danger', 'Oops! skill no created');

        $url = $request->filled('member') ? route('members.edit', $request->member) : route('members.index');

        return redirect($url)->with('success', "{$skill->name} skill created");
    }

    public function show(Skill $skill)
    {
        $skill->loadCount('members');

        return view('skills.show')->with('skill', $skill);
    }

    public function edit(Skill $skill, Request $request)
    {
        return view('skills.edit', [
            'skill' => $skill->loadCount('members'),
            'back_url' => $request->filled('member') ? route('members.edit', $request->member) : route('members.index'),
            'route_parameters' => $request->filled('member') ? [$skill, 'member' => $request->member] : [$skill],
        ]);
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        if(! $skill->fill($request->validated())->save() )
            return back()->with('danger', 'Oops! skill no updated');

        $route_parameters = $request->filled('member') ? [$skill, 'member' => $request->member] : [$skill];

        return redirect()->route('skills.edit', $route_parameters)->with('success', "{$skill->name} skill updated");
    }

    public function destroy(Skill $skill, Request $request)
    {
        if(! $skill->delete() )
            return back()->with('danger', 'Oops! skill no deleted');

        $url = $request->filled('member') ? route('members.edit', $request->member) : route('members.index');

        return redirect($url)->with('success', "{$skill->name} skill deleted");
    }
}
