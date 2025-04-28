<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Signstate;

class signstageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signstages = Signstate::paginate(10);
        return view('signstages.index',compact('signstages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('signstages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateIsUsed(string $id)
    {
        //
    }
}
