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
            'name' => 'required',
        ], [
            'symbol.required' => '職位代碼為必填!',
            'symbol.alpha_num' => '職位代碼僅能輸入英文或數字!',
            'name.required' => '職位中文名稱為必填!',
        ]);

        //check data exists
        $isExists =  DB::table('roles')
            ->where('symbol', $request->symbol)
            ->first();

        if ($isExists) {
            return back()->withErrors([
                'symbol' => '該職位代碼已存在，請選擇其他名稱。',
            ])->withInput();
        }

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
        //
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
