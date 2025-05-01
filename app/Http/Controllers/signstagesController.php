<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Signstage;

class signstagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signstages = Signstage::paginate(10);
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
        Signstage::create($request->all());
        return redirect()->route('signstages.index')->with('success', '新增簽核成功');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $signstage = Signstage::findOrFail($id);
        return view('signstages.edit', compact('signstage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $signstage = Signstage::findOrFail($id);

        $signstage->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return redirect()->route('signstages.index')->with('success', "簽核更新成功！");
    }

    public function updateIsUsed(string $id)
    {
        $signstage = Signstage::findOrFail($id);
        $signstage->IsUsed = !$signstage->IsUsed;
        $signstage->save();

       return redirect()->route('signstages.index')->with('success', '已更新成功');

    }
}
