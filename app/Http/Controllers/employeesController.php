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
                            ["parameters.type","=", DB::raw("'Sex'")],
                            ["parameters.value","=","employees.sex"]
                       ])
                       ->select('parameters.description as sex', 'cities.name as city_name', 
                                'districts.name as district_name', 'employees.name as employee_name',
                                'birthday', 'employeeno', 'is_banned')
                       ->paginate(10);

        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = DB::table('cities')->select('id','name', 'seq')->get();
        $districts = DB::table('districts')->select('id','city_id', 'zipcode', 'name', 'seq')->get();
        $sexs = DB::table('parameters')->select('description', 'value')->where('type','Sex')->get();
        return view('employees.create',compact('cities', 'districts', 'sexs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 檢查資料是否正常
        $validated = $request->validate([
            'employeeno' => 'required|string',
            'name' => 'required|string',
            'sex' => 'required|integer',
            'mobile' => 'required|string',
            'birthday' => 'required|date',
            'city_id' => 'required|integer',
            'district_id' => 'required|integer',
            'street' => 'required|string',
            'emergencycontactname' => 'nullable|string',
            'emergencycontactphone' => 'nullable|string',
        ]);

        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', '創建員工成功！');

    }


    public function edit(string $employeeno)
    {
        $employee = Employee::findOrFail($employeeno);
        $districts = District::select('city_id','zipcode','name','seq')->orderBy('id','asc')->get();
        $cities = City::select('id','name')->orderBy('seq','asc')->get();
        $sexs = Parameter::select('description', 'value')->where('type','=', 'Sex')->orderBy('sequence','asc')->get();
        return view('employees.edit', compact('employee','districts', 'cities', 'sexs'));
    }

    public function updateIsBanned(Request $request, string $employeeno){

        Employee::where('employeeno', $employeeno)->update([
            'is_banned' => DB::raw('NOT is_banned')
        ]);

        return redirect()->route('employees.index')->with('success', '員工停權更新成功');
    }


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
