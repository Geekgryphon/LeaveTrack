<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //check form content
        $validated = $request->validate([
            'symbol' => 'required|alpha_num',
            'name' => 'required',
        ], [
            'symbol.required' => '職位代碼為必填!',
            'symbol.alpha_num' => '職位代碼僅能輸入英文或數字!',
            'name.required' => '職位中文名稱為必填!',
        ]);

        //check data exists
        $isExists =  DB::table('roles')
            ->where('symbol', $request->symbol)
            ->first();

        if ($isExists) {
            return back()->withErrors([
                'symbol' => '該職位代碼已存在，請選擇其他名稱。',
            ])->withInput();
        }

        Role::create($validated);

        return redirect()->route('roles.index')->with('success', '職位新增成功');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);;
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'symbol' => 'required|alpha_num',
            'name' => 'required',
        ], [
            'symbol.required' => '職位代碼為必填!',
            'symbol.alpha_num' => '職位代碼僅能輸入英文或數字!',
            'name.required' => '職位中文名稱為必填!',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'symbol' => $request->symbol,
            'name' => $request->name,
        ]);

        return redirect()->route('parameters.index')->with('success', "ID為{$id}的職位更新成功！");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', '參數刪除成功');
    }
}
