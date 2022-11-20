<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Models\Skill;

class MemberController extends Controller
{
    public function index()
    {
        return view('members.index')->with('members', Member::withCount('works')->simplePaginate(16));
    }

    public function create()
    {
        return view('members.create', [
            'member' => new Member,
            'roles' => ['administrator','coordinator','operator'],
        ]);
    }

    public function store(MemberRequest $request)
    {
        if(! $member = Member::create($request->validated()) )
            return back()->with('danger', 'Ups! member not saved');

        return redirect()->route('members.index')->with('success', "{$member->fullname} member saved");
    }

    public function show(Member $member)
    {
        return redirect()->route('members.index');
    }

    public function edit(Member $member)
    {
        return view('members.edit', [
            'member' => $member,
            'skills' => Skill::all()->sortBy('name'),
            'roles' => ['administrator','coordinator','operator'],
        ]);
    }

    public function update(MemberRequest $request, Member $member)
    {
        if(! $member->fill($request->validated())->save() )
            return back()->with('danger', 'Ups! member not updated');

        $member->syncSkills($request->skills ?? []);

        return redirect()->route('members.edit', $member)->with('success', "{$member->fullname} member updated");
    }

    /**
     * Soft deleted
     * 
     * The member keep his skills
     */
    public function destroy(Member $member)
    {
        if(! $member->delete() )
            return back()->with('danger', 'Ups! member not deleted');

        return redirect()->route('members.index')->with('success', "{$member->fullname} member deleted");
    }
}
