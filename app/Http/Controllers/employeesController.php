<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\District;
use App\Models\Employee;
use App\Models\Parameter;

class employeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = DB::table('employees')
                       ->join('cities', 'employees.city_id', '=', 'cities.id')
                       ->join('districts', 'employees.district_id', '=', 'districts.id')
                       ->leftJoin('parameters', [
                            ["parameters.name","=", 'Sex'],
                            ["parameters.value","=","employees.sex"]
                       ])
                       ->select('parameters.value as sex', 'cities.name as city_name', 
                                'districts.name as district_name', 'name', 'emergencycontactname',
                                'birthday')
                       ->paginate(10);

        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = DB::table('cities')->select('name', 'seq')->get();
        $districts = DB::table('districts')->select('city_id', 'zipcode', 'name', 'seq')->get();
        $Sexs = DB::table('parameters')->where('type','Sex')->select('description', 'value')->get();
        return view('employees.create',compact('cities', 'districts', 'Sexs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = Employee::create($request);
        return redirect()->route('employees.index')->with('success', '創建員工成功！');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $districts = District::all();
        $cities = City::all();
        $sexs = Parameter::where('name','=', 'Sex')->orderBy('sequence','asc');
        return view('employees.edit', compact('employee','district', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update([
            'name' => $request->name,
            'sex' => $request->sex,
            'mobile' => $request->mobile,
            'birthday' => $request->birthday,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'street' => $request->street,
            'emergencycontactname' => $request->emergencycontactname,
            'emergencycontactphone' => $request->emergencycontactphone,
        ]);
        return redirect()->route('employees.index')->with('success', '員工資料更新成功');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', '員工資料刪除成功');
    }
}
