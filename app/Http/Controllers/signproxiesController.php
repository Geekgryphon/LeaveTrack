<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Signproxy;

class signproxiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signproxies =  DB::table('signproxy')
                        ->join('employees as a', 'signproxy.employee_id', '=', 'a.employeeno')
                        ->join('employees as b', 'signproxy.proxy_id', '=', 'b.employeeno')
                        ->select('signproxy.*', 'a.name as signname', 'b.name as proxyname')
                        ->paginate(10);
        return view('signproxies.index',compact('signproxies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = DB::table('employees')->select('employeeno', 'name')->get();

        return view('signproxies.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'proxy_id' => 'required|different:employee_id'
        ],[
            'proxy_id.different' => '代理人不能與申請人相同。',
        ]);

        Signproxy::create($request->all());
        return redirect()->route('signproxies.index')->with('success', '代理資料新增成功');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $signproxy = Signproxy::findOrFail($id);
        $employees = DB::table('employees')->select('employeeno', 'name')->get();
        return view('signproxies.edit',compact('signproxy', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $signproxy = Signproxy::findOrFail($id);
        $signproxy->update([
          'employee_id'  => $request->employee_id,
          'proxy_id'  => $request->proxy_id,
          'begintime'  => $request->begintime,
          'endtime'  => $request->endtime
        ]);
        return redirect()->route('signproxies.index')->with('success', '代理人資料更新成功');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $signproxy = Signproxy::findOrFail($id);
        $signproxy->delete();
        return redirect()->route('signproxies.index')->with('success', '代理人資料刪除成功');
    }
}
