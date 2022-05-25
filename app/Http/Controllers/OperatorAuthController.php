<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkUpdateByOperatorRequest;
use App\Models\Operator;
use App\Models\Work;

class OperatorAuthController extends Controller
{
    public function index()
    {
        $operator = Operator::find(5);
        
        return view('operators_auth.index', [
            'operator' => $operator,
            'works' => $operator->works()->with(['job','client','intermediary'])->whereIn('status', Work::allOpenStatus())->orderBy('priority')->get(),
        ]);
    }

    public function show(Work $work)
    {
        return view('operators_auth.show', [])->with('work', $work);
    }

    public function update(WorkUpdateByOperatorRequest $request, Work $work)
    {
        if(! $work->fill( $request->validated() )->save() )
            return redirect()->route('operators_auth.show', $work)->with('danger', 'Oops! work not updated');

        $message = $work->hasStatus('started') ? "{$work->job_name} has started" : "{$work->job_name} is over";

        return redirect()->route('operators_auth.show', $work)->with('success', $message);
    }
}
