<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parameter;


class leavetypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leavetypes = DB::table('parameters')->where('type', 'Leavetype')->orderby('sequence', 'asc')->paginate(10);
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
            'name' => 'required',
            'description' => 'required',
            'value' => 'required',
        ], [
            'name.required' => '假別英文名稱為必填!',
            'description.required' => '假別中文名稱為必填!',
            'value.required' => '假別代號為必填!',
        ]);

        //check data exists
        $isExists =  DB::table('parameters')
            ->where('value', $request->value)
            ->where('type', 'Leavetype')
            ->first();

        if ($isExists) {
            return back()->withErrors([
                'name' => '該假別代碼已存在，請輸入其他資料。',
            ])->withInput();
        }

        $seq = DB::table('parameters')->where('type', 'Leavetype')->count() + 1;


        $validated = array_merge($validated, [
            'type' => 'Leavetype',
            'sequence' => $seq
        ]);


        Parameter::create($validated);

        // redirect 有避免使用者重新送出表單的效果 store destroy
        return redirect()->route('leavetypes.index')->with('success', '假別新增成功');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $leavetype = Parameter::findOrFail($id);;
        return view('leavetypes.edit', compact('leavetype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $leavetype = Parameter::findOrFail($id);
        $leavetype->update([
            'name' => $request->name,
            'description' => $request->description,
            'value' => $request->value
        ]);

        return redirect()->route('leavetypes.index')->with('success', "ID為{$id}的假別更新成功！");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leavetype = Parameter::findOrFail($id);
        $leavetype->delete();
        return redirect()->route('leavetypes.index')->with('success', '假別刪除成功');
    }
}
