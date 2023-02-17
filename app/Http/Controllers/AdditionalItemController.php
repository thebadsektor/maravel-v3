<?php

namespace App\Http\Controllers;

use App\Models\AdditionalItem;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;

class AdditionalItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.item.index', [
            'items' => AdditionalItem::paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->is_fixed != null)
        {
            $isFixed = 1;
        }else{
            $isFixed = 0;
        }

        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'value' => 'required|numeric'
        ]);

        if($request->description == null)
        {
            $description = "This is an additional item.";
        }

        AdditionalItem::create([
            'name' => $request->name,
            'is_fixed' => $isFixed,
            'value' => $request->value,
            'description' => $description,
        ]);

        return redirect('items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdditionalItem  $additionalItem
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionalItem $item)
    {
        //dd($item);
        return view('pages.item.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdditionalItem  $additionalItem
     * @return \Illuminate\Http\Response
     */
    public function edit(AdditionalItem $item)
    {
        // dd($item);
        return view('pages.item.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdditionalItem  $additionalItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdditionalItem $item)
    {
        if($request->is_fixed != null)
        {
            $isFixed = 1;
        }else{
            $isFixed = 0;
        }

        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'value' => 'required|numeric'
        ]);

        if($request->description == null)
        {
            $description = "This is an additional item.";
        }else{
            $description = $request->description;
        }

        $item->update([
            'name' => $request->name,
            'is_fixed' => $isFixed,
            'value' => $request->value,
            'description' => $description
        ]);
        return redirect('/item/show/'.$item->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdditionalItem  $additionalItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdditionalItem $item)
    {
        $item->delete();
        return redirect('items');
    }

    public function batchDestroy(Request $request)
    {
        $ids = $request->input('ids');
        AdditionalItem::destroy($ids);

        if($ids == null){
            return back()->with('error', 'The error message here!');
        }
        return redirect()->back();
    }
}
