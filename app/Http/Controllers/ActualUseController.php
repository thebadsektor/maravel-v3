<?php

namespace App\Http\Controllers;

use App\Models\ActualUse;
use Illuminate\Http\Request;

class ActualUseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(ActualUse::paginate(15));
        return view('pages.actual-use.index', [
            'actual_uses' => ActualUse::paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.actual-use.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ActualUse::create([
            'actual_use' => $request->actual_use,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect('actual-uses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActualUse  $actualUse
     * @return \Illuminate\Http\Response
     */
    public function show(ActualUse $actualUse)
    {
        return view('pages.actual-use.show')->with('actualUse', $actualUse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActualUse  $actualUse
     * @return \Illuminate\Http\Response
     */
    public function edit(ActualUse $actualUse)
    {
        return view('pages.actual-use.edit')->with('actualUse', $actualUse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActualUse  $actualUse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActualUse $actualUse)
    {
        $actualUse->update([
            'actual_use' => $request->actual_use,
            'category' => $request->category,
            'description' => $request->description
        ]);
        return redirect('/actual-use/show/'.$actualUse->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActualUse  $actualUse
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActualUse $actualUse)
    {
        $actualUse->delete();
        return redirect('actual-uses');
    }

    public function batchDestroy(Request $request)
    {
        $ids = $request->input('ids');
        ActualUse::destroy($ids);

        if($ids == null){
            return back()->with('error', 'The error message here!');
        }
        return redirect()->back();
    }
}
