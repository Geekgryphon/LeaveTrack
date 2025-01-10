<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LeaveType;

class leavetypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leavetypes = LeaveType::paginate(10);
        return view('leavetypes.index',compact('leavetypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leavetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //check form content
         $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ], [
            'code.required' => '假別代號為必填!',
            'name.required' => '假別名稱為必填!',
        ]);

        //check data exists
        $isExists =  DB::table('parameters')
            ->where('code', $request->code)
            ->where('name', $request->name)
            ->first();

        if ($isExists) {
            return back()->withErrors([
                'name' => '該假別代碼和名稱的組合已存在，請輸入其他資料。',
            ])->withInput();
        }


        LeaveType::create($validated);

        // redirect 有避免使用者重新送出表單的效果 store destroy
        return redirect()->route('leavetypes.index')->with('success', '假別新增成功');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $leavetype = LeaveType::findOrFail($id);;
        return view('leavetypes.edit', compact('leavetype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //check form content
       $validated = $request->validate([
        'code' => 'required',
        'name' => 'required',
        ], [
            'code.required' => '假別代號為必填!',
            'name.required' => '假別名稱為必填!',
        ]);

        $leavetype = LeaveType::findOrFail($id);
        $leavetype->update([
            'code' => $request->code,
            'name' => $request->name
        ]);

        return redirect()->route('leavetypes.index')->with('success', "ID為{$id}的假別更新成功！");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leavetype = LeaveType::findOrFail($id);
        $leavetype->delete();
        return redirect()->route('leavetypes.index')->with('success', '假別刪除成功');
    }
}
