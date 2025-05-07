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
        $signstagedetails = DB::table('signstagedetails')->select('*')->get();
        
        return view('signstagedetails.index', compact('signstagedetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $signstages = DB::table('signstages')->select('*')->get();
        $employees = DB::table('employees')->select('employee', 'name')->get();
        return view('signstagedetails.create', compact('signstages', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        return redirect()->route('signstagedetails.index')->with('success','新增簽核關卡成功');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  view('signstagedetails.edit',compact('', 'signs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
