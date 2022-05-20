<?php

namespace App\Http\Controllers;

use App\Models\Intermediary;
use App\Http\Requests\IntermediaryRequest;
use Illuminate\Http\Request;

class IntermediaryController extends Controller
{
    public function index()
    {
        return view('intermediaries.index')->with('intermediaries', Intermediary::all()->sortBy('name'));
    }

    public function create()
    {
        return view('intermediaries.create')->with('intermediary', new Intermediary);
    }

    public function store(IntermediaryRequest $request)
    {
        if(! $intermediary = Intermediary::create($request->validated()) )
            return back()->with('danger', 'Oops! intermediary no created');

        return redirect()->route('intermediaries.index')->with('success', "{$intermediary->name} intermediary created");
    }

    public function show(Intermediary $intermediary)
    {
        return view('intermediaries.show')->with('intermediary', $intermediary);
    }

    public function edit(Intermediary $intermediary)
    {
        return view('intermediaries.edit')->with('intermediary', $intermediary);
    }

    public function update(IntermediaryRequest $request, Intermediary $intermediary)
    {
        if(! $intermediary->fill($request->validated())->save() )
            return back()->with('danger', 'Oops! intermediary no updated');

        return redirect()->route('intermediaries.edit', $intermediary)->with('success', "{$intermediary->name} intermediary updated");
    }

    public function destroy(Intermediary $intermediary)
    {
        if(! $intermediary->delete() )
            return back()->with('danger', 'Oops! intermediary no deleted');

        return redirect()->route('intermediaries.index')->with('success', "{$intermediary->name} intermediary deleted");
    }
}
