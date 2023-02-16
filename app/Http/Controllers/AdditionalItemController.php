<?php

namespace App\Http\Controllers;

use App\Models\AdditionalItem;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdditionalItem  $additionalItem
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionalItem $additionalItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdditionalItem  $additionalItem
     * @return \Illuminate\Http\Response
     */
    public function edit(AdditionalItem $additionalItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdditionalItem  $additionalItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdditionalItem $additionalItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdditionalItem  $additionalItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdditionalItem $additionalItem)
    {
        //
    }
}
