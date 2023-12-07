<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = array(
            'url_add' => 'user.create',
        );
        $users = User::all();
        $roles = Role::orderBy('name')->get();
        return view('user.index', compact('users', 'roles', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = array(
            'url_add' => 'user.store',
        );
        $roles = Role::orderBy('name')->get();
        return view('user.add', compact('roles', 'datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required|string',
            // 'username' => 'required|unique:users',
            'email' => 'required|string|email:rfc|unique:users',
            'role' => 'nullable|string',
            'verified' => 'nullable|boolean',
        ], $this->rules);

        User::create(array_merge(
            $validasi->validated(),
            array(
                'password' => Hash::make('password'),
                'email_verified_at' => !blank($request->verified) ? now() : null
            )
        ))?->assignRole(!blank($request->role) ? $request->role : array());

        return redirect()->route('user.index')->with('success', 'User Created');
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
            'url_update' => 'user.update',
        );
        $user = User::findorfail($id);
        $roles = Role::orderBy('name')->get();

        return view('user.edit', compact('user', 'roles', 'datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validasi = Validator::make($request->all(), [
            'name' => 'required|string',
            // 'username' => 'required',
            'email' => 'required|string|email:rfc',
            'role' => 'nullable|string',
            'verified' => 'nullable|boolean',
        ]);


        $user->syncRoles($request->role);
        $email = $request->email === $user->email
            ? $request->email
            : (blank(User::firstWhere('email', $request->email)) ? $request->email : null);

        blank($email) ? false : $user->update(array_merge(
            $validasi->validated(),
            array(
                'email' => $email,
                'email_verified_at' => !blank($request->verified) ? now() : null
            )
        ));
        return redirect()->route('user.index')->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return $user->delete()
            ? back()->with('success', 'User Deleted')
            : back()->with('error', 'Something Wrong !!!');
    }

    private $rules=[
        'name.required' => 'Nama lengkap harus diisi',
        // 'username.required' => 'Username harus diisi',
        // 'username.unique' => 'Username telah digunakan',
        'email.required' => 'Alamat Email harus diisi',
        'email.unique' => 'Alamat Email telah digunakan',
    ];
}
