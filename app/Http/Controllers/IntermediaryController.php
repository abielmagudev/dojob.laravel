<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntermediaryRequest;
use App\Models\Intermediary;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntermediaryController extends Controller
{
    public function index()
    {
        return view('intermediaries.index')->with('intermediaries', Intermediary::withCount('works')->orderBy('id', 'desc')->get());
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
        foreach(Work::allStatus() as $status)
            $counters_status_zero[$status] = 0;

        foreach($intermediary->works->load('job') as $work)
        {
            if(! isset($works[$work->job->name]) )
            {
                $works[$work->job->name] = $counters_status_zero;
                $works[$work->job->name]['total'] = 0;
            }

            $works[$work->job->name][$work->status]++;
            $works[$work->job->name]['total']++;
        }

        return view('intermediaries.show', [
            'all_status' => Work::allStatus(),
            'intermediary' => $intermediary,
            'works' => collect($works),
        ]);
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
