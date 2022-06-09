<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intermediary;
use App\Models\Work;

class IntermediaryAuthController extends Controller
{
    public function index()
    {
        $intermediary = Intermediary::all()->random(1)->first();
        
        return view('intermediaries_auth.index', [
            'intermediary' => $intermediary,
            'works' => $intermediary->works()->with(['job','client','intermediary'])->whereIn('status', Work::allOpenStatus())->orderBy('priority')->get()
        ]);
    }

    public function show(Work $work)
    {
        return view('intermediaries_auth.show')->with('work', $work);
    }
}
