<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parameter;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = DB::table('parameters')->Select('id', 'value', 'description')
        ->where('type',"=", "Role")->OrderBy('value','asc')->paginate(10);
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
        $validated = $request->validate([
            'name' => 'required',
            'value' => 'required|alpha_num',
            'description' => 'required',
        ], [
            'name.required' => '職位名稱為必填!',
            'value.required' => '職位代碼為必填!',
            'value.alpha_num' => '職位代碼僅能輸入英文或數字!',
            'description.required' => '職位中文名稱為必填!',
        ]);

        //check data exists
        $isExists =  DB::table('parameters')
            ->where('value', '=', $request->value)
            ->where('type', '=', 'Role')
            ->first();

        if ($isExists) {
            return back()->withErrors([
                'value' => '該職位代碼已存在，請選擇其他名稱。',
            ])->withInput();
        }

        

        //
        $seq = DB::table('parameters')
        ->select('sequence')->where('type', '=', 'Role')->orderBy('sequence', 'desc')
        ->first();

        $seq = (int)$seq->sequence;

        $validated['type'] = 'Role';
        $validated['sequence'] = $seq + 1;

        Parameter::create($validated);

        return redirect()->route('roles.index')->with('success', '職位新增成功');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Parameter::findOrFail($id);;
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'value' => 'required|alpha_num',
            'description' => 'required',
        ], [
            'name.required' => '職位名稱為必填!',
            'value.required' => '職位代碼為必填!',
            'value.alpha_num' => '職位代碼僅能輸入英文或數字!',
            'description.required' => '職位中文名稱為必填!',
        ]);

        $role = Parameter::findOrFail($id);
        $role->update([
            'name' => $request->name,
            'value' => $request->value,
            'description' => $request->description,
        ]);

        return redirect()->route('roles.index')->with('success', "職位更新成功！");
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
