<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\City;


class citiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::paginate(10);
        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //check form content
        $validated = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => '縣市中文名稱為必填!',
        ]);

        //check data exists
        $isExists =  DB::table('cities')
            ->where('name', $request->name)
            ->first();

        if ($isExists) {
            return back()->withErrors([
                'name' => '該縣市已存在，請輸入其他名稱。',
            ])->withInput();
        }

        // get sequence
        $seq = DB::table('cities')
                    ->orderBy('seq', 'desc')
                    ->limit(1)
                    ->value('seq');
        $seq = ($seq === null) ? 1 : $seq + 1;
        $validated['seq'] = $seq;

        City::create($validated);

        return redirect()->route('cities.index')->with('success', '縣市新增成功');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::findOrFail($id);;
        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //check form content
        $validated = $request->validate([
            'name' => 'required',
            'seq' => 'required',
        ], [
            'name.required' => '縣市中文名稱為必填!',
            'seq.required' => '排序資料不得為空!',
        ]);

        $city = City::findOrFail($id);
        $city->update([
            'name' => $request->name,
            'seq' => $request->seq
        ]);

        return redirect()->route('cities.index')->with('success', "ID為{$id}的縣市資料更新成功！");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('cities.index')->with('success', '刪除成功');
    }
}
