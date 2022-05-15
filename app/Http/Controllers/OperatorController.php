<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperatorRequest;
use App\Models\Operator;
use App\Models\Crew;

class OperatorController extends Controller
{
    public function index()
    {
        return view('operators.index')->with('operators', Operator::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('operators.create')->with('operator', new Operator);
    }

    public function store(OperatorRequest $request)
    {
        if(! $operator = Operator::create($request->validated()) )
            return back()->with('danger', 'Ups! operator not saved');

        return redirect()->route('operators.index')->with('success', "{$operator->fullname} operator saved");
    }

    public function show(Operator $operator)
    {
        return view('operators.show')->with('operator', $operator);
    }

    public function edit(Operator $operator)
    {
        return view('operators.edit', [
            'operator' => $operator,
            'crews' => Crew::onlyEnabled()->get(),
        ]);
    }

    public function update(OperatorRequest $request, Operator $operator)
    {
        if(! $operator->fill($request->validated())->save() )
            return back()->with('danger', 'Ups! operator not updated');

        return redirect()->route('operators.edit', $operator)->with('success', "{$operator->fullname} operator updated");
    }

    public function destroy(Operator $operator)
    {
        if(! $operator->delete() )
            return back()->with('danger', 'Ups! operator not deleted');

        return redirect()->route('operators.index')->with('success', "{$operator->fullname} operator deleted");
    }
}
