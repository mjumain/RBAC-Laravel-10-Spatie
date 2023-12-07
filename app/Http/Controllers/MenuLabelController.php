<?php

namespace App\Http\Controllers;

use App\Models\MenuLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class MenuLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datas = array(
            'url_add' => 'menu.create',
        );
        $menuGroups = MenuLabel::all();
        $permissions = Permission::orderBy('name')->get();

        return view('menu.index', compact('menuGroups', 'permissions','datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = array(
            'url_add' => 'menu.store',
        );
        $permissions = Permission::orderBy('name')->get();
        return view('menu.add', compact('permissions','datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required|string',
            'permission_name' => 'required|string',
        ], $this->rules);

        return MenuLabel::create(array_merge(
            $validasi->validated(),
            array(
                'status' => !blank($request->status) ? true : false,
                'posision' => MenuLabel::max('posision') + 1
            )
        ))
            ? redirect()->route('menu.index')->with('success', 'Menu Created')
            : back()->with('error', 'Create Menu Failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('menu.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datas = array(
            'url_update' => 'menu.update',
        );
        $menuGroup = MenuLabel::findorfail($id);
        $permissions = Permission::orderBy('name')->get();

        return view('menu.edit', compact('menuGroup', 'permissions','datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required|string',
            'permission_name' => 'required|string',
        ], $this->rules);

        DB::table('menu_titles')->where('id', $id)->update(
            array_merge(
                $validasi->validated(),
                array(
                    'status' => !blank($request->status) ? true : false,
                )
            )
        );
        return redirect()->route('menu.index')->with('success', 'Menu Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuLabel $menu)
    {
        return $menu->delete()
            ? back()->with('success', 'Menu group has been deleted successfully!')
            : back()->with('error', 'Menu group was not deleted successfully!');
    }
    private $rules =
    [
        'name.required' => 'Nama Menu Group harus diisi',
        'permission_name.required' => 'Permission Group harus diisi',
    ];
}
