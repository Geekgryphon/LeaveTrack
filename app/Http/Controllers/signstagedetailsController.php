<?php

namespace App\Http\Controllers;

use App\Models\Signstagedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class signstagedetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signstagedetails = DB::table('signstagedetails')
        ->join('signstages', 'signstagedetails.signstage_id', '=', 'signstages.id')
        ->join('employees', 'signstagedetails.employee_id', '=', 'employees.employeeno')
        ->select('employees.employeeno as employee_id',
                 'employees.name as employee_name',
                 'signstagedetails.order as seq',
                 'signstagedetails.id',
                 'signstages.id as signstage_id',
                 'signstages.code as signstage_code')
        ->get();
        
        return view('signstagedetails.index', compact('signstagedetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $signstages = DB::table('signstages')->select('id', 'name')
        ->where('IsUsed', '1')->get();
        $employees = DB::table('employees')->select('employeeno', 'name')->get();
        return view('signstagedetails.create', compact('signstages', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $signstageId = $request->input('signstage_id');
       $order = DB::table('signstagedetails')
                ->where("signstage_id", $signstageId)
                ->count() + 1;

        DB::table('signstagedetails')->insert([
            'signstage_id' => $signstageId,
            'employee_id' => $request->input('employee_id'),
            'order' => $order
        ]);

        return redirect()->route('signstagedetails.index')->with('success','新增簽核關卡成功');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $signstagedetail = Signstagedetail::findOrFail($id);
        $signstages = DB::table('signstages')->select('id', 'name')
        ->where('IsUsed', '1')->get();
        $employees = DB::table('employees')->select('employeeno', 'name')->get();
        return  view('signstagedetails.edit',compact('signstagedetail','employees', 'signstages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $signstagedetail = Signstagedetail::findOrFail($id);
        $signstagedetail->employee_id = $request->input('employeeno');
        $signstagedetail->order = $request->input('order');
        $signstagedetail->save();
        return redirect()->route('signstagedetails.index')->with('success', '編輯簽核關卡完成');
    }

    public function updateSignDetail(Request $request, string $id){
        $signdetail = Signstagedetail::findOrfail($id);
        $signdetail->IsUsed = $signdetail->IsUsed ? 0 : 1 ;
        $signdetail->save();
        return redirect()->route('signstagedetails.index')->with('success', '簽核關卡更新完成');
    }

    public function destory(string $id){
        $signstagedetail = Signstagedetail::findOrfail($id);
        $signstagedetail->delete();
        return redirect()->route('signstagedetails.index')->with('success','簽核關卡刪除完成');
    }

}
