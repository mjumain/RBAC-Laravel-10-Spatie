<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = array(
            'url_add' => 'role.create',
        );
        $roles = Role::all();
        $permissions = Permission::orderBy('name')->get();

        return view('role.index', compact('roles', 'permissions','datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = array(
            'url_add' => 'role.store',
        );
        $permissions = Permission::orderBy('name')->get();
        return view('role.add', compact('permissions','datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'guard_name' => ['nullable', 'string', 'required'],
            'roles.*' => ['nullable', 'string'],
        ], $this->rules);

        return Role::create($validasi->validated())
            ?->givePermissionTo(!blank($request->permissions) ? $request->permissions : array())
            ? redirect()->route('role.index')->with('success', 'Rolw has been updated successfully!')
            : back()->with('error', 'Role was not created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datas = array(
            'url_update' => 'role.update',
        );
        $permissions = Permission::all();
        $role = Role::findorfail($id);

        return view('role.edit', compact('permissions', 'role', 'datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validasi = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'guard_name' => ['nullable', 'string', 'required'],
            'permissions.*' => ['nullable', 'string'],
        ], $this->rules);

        return $role->update($validasi->validated())
            && $role->syncPermissions(!blank($request->permissions) ? $request->permissions : array())
            ? redirect()->route('role.index')->with('success', 'Role has been updated successfully!')
            : back()->with('failed', 'Role was not updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        return $role->delete()
            ? back()->with('success', 'Role has been deleted successfully!')
            : back()->with('failed', 'Role was not deleted successfully!');
    }

    private $rules =
    [
        'name.required' => 'Nama Role harus diisi',
        'guard_name.required' => 'Guard Name harus diisi',
    ];
}
