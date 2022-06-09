<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarrantyRequest;
use App\Models\Warranty;
use App\Models\Work;

class WarrantyController extends Controller
{
    public function index()
    {                        
        return view('warranties.index')->with('warranties', Warranty::with('work')->orderBy('expires','desc')->get());
    }

    public function create(Work $work)
    {
        return view('warranties.create', [
            'warranty' => new Warranty,
            'work' => $work,
        ]);
    }

    public function store(WarrantyRequest $request)
    {
        if(! $warranty = Warranty::create($request->validated()) )
            return back()->with('danger', 'Oops! warranty not created');

        return redirect()->route('works.warranties', $warranty->work_id)->with('success', "{$warranty->name} warranty created");
    }

    public function edit(Warranty $warranty)
    {
        return view('warranties.edit')->with('warranty', $warranty);
    }

    public function update(WarrantyRequest $request, Warranty $warranty)
    {
        if(! $warranty->fill($request->validated())->save() )
            return back()->with('danger', 'Oops! warranty not updated');

        return redirect()->route('warranties.edit', $warranty)->with('success', "{$warranty->name} warranty updated");
    }

    public function destroy(Warranty $warranty)
    {
        if(! $warranty->delete() )
            return back()->with('danger', 'Oops! warranty not deleted');

        return redirect()->route('works.warranties', $warranty->work_id)->with('success', "{$warranty->name} ({$warranty->expires}) warranty deleted");
    }
}
