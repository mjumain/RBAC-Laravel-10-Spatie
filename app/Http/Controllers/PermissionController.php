<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datas = array(
            'url_add' => 'permission.create',
        );
        $permissions = Permission::all();
        $roles = Role::orderBy('name')->get();
        return view('permission.index', compact('permissions', 'roles', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = array(
            'url_add' => 'permission.store',
        );
        $roles = Role::orderBy('name')->get();

        return view('permission.add', compact('roles', 'datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'guard_name' => ['nullable', 'string'],
            'roles.*' => ['nullable', 'string'],
        ], $this->rules);

        return Permission::create($validasi->validated())
            ?->assignRole(!blank($request->roles) ? $request->roles : array())
            ? redirect()->route('permission.index')->with('success', 'Permission has been created successfully!')
            : back()->with('error', 'Permission was not created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('permission.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datas = array(
            'url_update' => 'permission.update',
        );
        $permission = Permission::findorfail($id);
        $roles = Role::orderBy('name')->get();
        return view('permission.edit', compact('permission', 'roles', 'datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $validasi = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'guard_name' => ['nullable', 'string'],
            'roles.*' => ['nullable', 'string'],
        ], $this->rules);

        return $permission->update($validasi->validated())
            && $permission->syncRoles(!blank($request->roles) ? $request->roles : array())
            ? redirect()->route('permission.index')->with('success', 'Permission has been updated successfully!')
            : back()->with('failed', 'Permission was not updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        return $permission->delete()
            ? back()->with('success', 'Permission has been deleted successfully!')
            : back()->with('failed', 'Permission was not deleted successfully!');
    }

    public function generate(Request $request)
    {

        $validasi = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'permission' => ['required'],
        ], $this->rules);

        foreach ($request->permission as $key => $value) {
            $insert=[
                'name' => $request->name.'_'.$value,
                'guard_name' => null,
            ];
            Permission::create($insert);
        }
    }

    private $rules = [
        'name.required' => 'Nama Permission harus diisi',
    ];
}
