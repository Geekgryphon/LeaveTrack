<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parameter;

class parametersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parameters = Parameter::paginate(10);
        return view('parameters.index', compact('parameters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parameters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //check form content
        $validated = $request->validate([
            'type' => 'required|max:160|alpha_num',
            'name' => 'required|max:160|alpha_num',
            'description' => 'required|max:240',
            'value' => 'required|max:255',
        ], [
            'type.required' => '參數類別為必填!',
            'type.max' => '參數類別文字長度請勿超過20個字!',
            'type.alpha_num' => '參數類別僅能輸入英文或數字!',
            'name.required' => '參數名稱為必填!',
            'name.max' => '參數名稱文字長度請勿超過20個字!',
            'name.alpha_num' => '參數名稱僅能輸入英文或數字!',
            'description.max' => '參數名稱文字長度請勿超過10個中文字!',
            'value.required' => '參數值為必填!',
            'value.max' => '參數值文字長度請勿超過30個字!',
        ]);

        //check data exists
        $isExists =  DB::table('parameters')
            ->where('type', $request->type)
            ->where('name', $request->name)
            ->first();

        if ($isExists) {
            return back()->withErrors([
                'name' => '該參數類別和名稱的組合已存在，請選擇其他名稱。',
            ])->withInput();
        }

        // get sequence
        $sequence = DB::table('parameters')
                    ->where('type', $request->type)
                    ->orderBy('sequence', 'desc')
                    ->limit(1)
                    ->value('sequence');
        $sequence = ($sequence === null) ? 0 : $sequence + 1;
        $validated['sequence'] = $sequence;

        Parameter::create($validated);

        return redirect()->route('parameters.index')->with('success', '參數新增成功');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('parameters.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $parameter = Parameter::findOrFail($id);
        $parameter->delete();
    }
}
