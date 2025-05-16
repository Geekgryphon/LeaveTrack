<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LeaveForm;

class leaveformsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaveforms = "";
        return view("leaveforms.index", compact("leaveforms"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = DB::table('employees')->select('employeeno', 'name')->get();
        $signstages = DB::table('signstages')->select('id', 'code', 'name')->where('IsUsed', '1')->get();
        return view("leaveforms.create", compact("employees", "signstages"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route("leaveforms.index")->with("success","");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route("leaveforms.index")->with("success","該單做廢成功");
    }
}
