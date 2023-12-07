<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuLabel;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, MenuLabel $menu)
    {
        $menuItems = $menu->items()->when(!blank($request->search), function ($query) use ($request) {
            return $query
                ->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('permission_name', 'like', '%' . $request->search . '%');
        })
            ->orderBy('name')
            ->paginate(20);

        return view('menu.item.index', compact('menu', 'menuItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(MenuLabel $menu)
    {
        $permissions = Permission::orderBy('name')->get();
        $routes = FacadesRoute::getRoutes();

        return view('menu.item.add', compact('menu', 'permissions', 'routes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, MenuLabel $menuGroup, Menu $menuItem, $menu_id)
    {
        // dd($menu_id);
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'route' => 'required',
            'permission_name' => 'required',
            'icon' => 'required',
            'status' => 'required',
        ], $this->rules);

        return $menuItem->create(array_merge(
            $validasi->validated(),
            array(
                'menu_label_id' => $menu_id,
                'status' => !blank($request->status) ? true : false,
                'posision' => $menuGroup->items()->max('posision') + 1
            )
        )) ? redirect()->route('menu.item.index', $menu_id)->with('success', 'Menu item has been created successfully!')
            : back()->with('error', 'Menu item was not created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($menu_id, $menu_item_id)
    {
        $menu = $menu_id;
        $menuItem = Menu::findorfail($menu_item_id);

        $permissions = Permission::orderBy('name')->get();
        $routes = FacadesRoute::getRoutes();

        return view('menu.item.edit', compact('menu', 'menuItem', 'permissions', 'routes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $menu_id, $menuItem)
    {
        // dd($menuItem);
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'route' => 'required',
            'permission_name' => 'required',
            'icon' => 'required',
            'status' => 'required',
        ], $this->rules);

        DB::table('menus')->where('id', $menuItem)->update(
            array_merge(
                $validasi->validated(),
                array(
                    'menu_label_id' => $menu_id,
                    'status' => !blank($request->status) ? true : false,
                )
            )
        );
        return redirect()->route('menu.item.index', $menu_id)->with('success', 'Menu item has been created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuLabel $menu, Menu $item)
    {
        // dd($item);
        return $item->delete()
            ? back()->with('success', 'Menu item has been deleted successfully!')
            : back()->with('failed', 'Menu item was not deleted successfully!');
    }

    private $rules =
    [
        'name.required' => 'Nama Menu Group harus diisi',
        'route.required' => 'Route harus diisi',
        'permission_name.required' => 'Permission Group harus diisi',
    ];
}
