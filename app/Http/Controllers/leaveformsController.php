<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class leaveformsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("leaveforms.index",compact(""));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("leaveforms.create", compact(""));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route("leaveforms.index")->with("success","");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("leaveforms.edit",compact(""));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route("leaveforms.index")->with("success","");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route("leaveforms.index")->with("success","");
    }
}
