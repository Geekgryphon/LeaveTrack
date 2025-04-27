<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\JobExpr;

class jobexprsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobexprs = DB::table('jobexprs')
        ->join('parameters', function($join){
            $join->on('jobexprs.jobtype', '=', 'parameters.value')
                 ->where('parameters.type', '=', 'Role');
        })
        ->select('jobexprs.*', 'parameters.description', 'parameters.value')
        ->orderBy('jobexprs.seq','asc')->paginate(10);
        
        return view('jobexprs.index',compact('jobexprs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::select('employeeno', 'name')->get();
        $roles = DB::table('parameters')->where('type', '=', 'Role')->orderBy('seq', 'asc')
                    ->select('description', 'value')->get();

        return view('jobexprs.create',compact('roles', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jobExprCount = DB::table('jobexprs')
                           ->where('employee_id', $request->input('employee_id'))
                           ->count() + 1;

        $request->merge([
            'seq' => $jobExprCount,
        ]);

        JobExpr::create($request->all());
        return redirect()->route('jobexprs.index')->with('success', '工作經歷新增成功');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employees = Employee::select('employeeno', 'name')->get();
        $roles = DB::table('parameters')->where('type', '=', 'Role')->orderBy('seq', 'asc')
                    ->select('description', 'value')->get();
        $jobexpr = JobExpr::findOrFail($id);;
        return view('jobexprs.edit', compact('jobexpr', 'employees', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jobexpr = JobExpr::findOrFail($id);
        
        $jobexpr->update([
            'employee_id' => $request->employee_id,
            'jobtype' => $request->jobtype,
            'begindate' => $request->begindate,
            'enddate' => $request->enddate,
        ]);

        return redirect()->route('jobexprs.index')->with('success', "ID為{$id}的工作經歷更新成功！");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobexpr = JobExpr::findOrFail($id);
        $jobexpr->delete();
        return redirect()->route('jobexprs.index')->with('success', '工作經歷刪除成功');
    }
}
