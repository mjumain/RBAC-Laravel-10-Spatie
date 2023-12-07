<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datas = array(
            'url_add' => 'route.create',
        );
        $routes = Route::query()
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('route', 'like', '%' . $request->search . '%')
                    ->orWhere('permission_name', 'like', '%' . $request->search . '%');
            })
            ->orderBy('route')
            ->paginate(100);

        return view('route.index', compact('routes','datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = array(
            'url_add' => 'route.store',
        );
        $facadesRoutes = FacadesRoute::getRoutes();
        $permissions = Permission::orderBy('name')->get();

        return view('route.add', compact('facadesRoutes', 'permissions','datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = Validator::make($request->all(), [
            'route' => ['required', 'string'],
            'permission_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
        ], $this->rules);

        return Route::create(array_merge(
            $validasi->validated(),
            array('status' => !blank($request->status) ? true : false)
        ))
            ? redirect()->route('route.index')->with('success', 'Route has been created successfully!')
            : back()->with('failed', 'Route was not created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datas = array(
            'url_update' => 'route.update',
        );
        $route = Route::findorfail($id);
        $facadesRoutes = FacadesRoute::getRoutes();
        $permissions = Permission::orderBy('name')->get();
        return view('route.edit', compact('facadesRoutes', 'permissions', 'route','datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route)
    {

        $validasi = Validator::make($request->all(), [
            'route' => ['required', 'string'],
            'permission_name' => ['required', 'string'],
        ], $this->rules);

        return $route->update(array_merge(
            $validasi->validated(),
            array('status' => !blank($request->status) ? true : false)
        ))
            ? redirect()->route('route.index')->with('success', 'Route has been updated successfully!')
            : back()->with('error', 'Route was not updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        return $route->delete()
            ? back()->with('success', 'Route has been deleted successfully!')
            : back()->with('error', 'Route was not deleted successfully!');
    }

    private $rules = [
        'route.required' => 'Nama Route harus diisi',
        'permission_name.required' => 'Nama Permission harus diisi',
    ];
}
