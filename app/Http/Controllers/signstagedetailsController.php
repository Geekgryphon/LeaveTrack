<?php

namespace App\Http\Controllers;

use App\Models\Signstagedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class signstagesdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signdetails = "";
        return view('signstagedetails.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $signs = DB::table('signstages')->select('*')->get();
        return view('signstagedetails.create', compact('signs'));
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
        return redirect()->route('signdetail.index')->with('success', '簽核關卡更新完成');


    }

}
