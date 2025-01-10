<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JobExpr;

class jobexprsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobexprs = JobExpr::paginate(10);
        return view('jobexprs.index',compact('jobexprs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobexprs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        JobExpr::create($request);
        return redirect()->route('jobexprs.index')->with('success', '工作經歷新增成功');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jobexpr = JobExpr::findOrFail($id);;
        return view('jobexprs.edit', compact('jobexpr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jobexpr = JobExpr::findOrFail($id);
        $jobexpr->update([
            'employeeID' => $request->employeeID,
            'jobtype' => $request->jobtype,
            'begindate' => $request->begindate,
            'enddate' => $request->enddate,
            'seq' => $request->seq
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
