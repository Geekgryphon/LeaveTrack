<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\District;


class districtsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = DB::table('districts')
                       ->join('cities', 'districts.city_id', '=', 'cities.id')
                       ->select('districts.id', 'cities.name as city_name', 
                                'districts.name as district_name', 'districts.zipcode', 
                                'districts.seq')
                       ->paginate(10);
        return view('districts.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('districts.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //check form content
        $validated = $request->validate([
            'zipcode' => 'required',
            'name' => 'required',
        ], [
            'zipcode.required' => '郵政區號為必填!',
            'name.required' => '鄉鎮名稱為必填!',
        ]);

        $validated['city_id'] = $request->city_id;

        //check data exists
        $isExists =  DB::table('districts')
            ->where('name', $request->name)
            ->first();

        if ($isExists) {
            return back()->withErrors([
                'name' => '該鄉鎮已存在，請輸入其他名稱。',
            ])->withInput();
        }

        // get sequence
        $seq = DB::table('districts')
                    ->orderBy('seq', 'desc')
                    ->limit(1)
                    ->value('seq');
        $seq = ($seq === null) ? 1 : $seq + 1;
        $validated['seq'] = $seq;


        District::create($validated);
        return redirect()->route('districts.index')->with('success', '鄉鎮新增成功');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $district = District::findOrFail($id);
        $cities = City::all();
        return view('districts.edit', compact('district', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $district = District::findOrFail($id);
        $district->update([
            'city_id' => $request->city_id,
            'zipcode' => $request->zipcode,
            'name' => $request->name,
            'seq' => $request->seq
        ]);
        return redirect()->route('districts.index')->with('success', '鄉鎮更新成功');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        return redirect()->route('districts.index')->with('success', '鄉鎮刪除成功');
    }
}
