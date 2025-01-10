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
        return views('districts.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return views('districts.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        District::create($request);
        return redirect()->route('districts.index')->with('success', '鄉鎮新增成功');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $district = District::findOrFail($id);
        return views('districts.edit', compact('district'));
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
