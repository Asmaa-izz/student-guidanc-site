<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{

    public function index()
    {
        return view('dashboard.roles.index', [
            'roles' => Role::with('permissions')->get(),
            'permissions' => Permission::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->ability);


        return redirect()->route('roles.index');
    }


    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request['name'],
        ]);

        $role->permissions()->detach();

        Log::info($request);

        if ($request['ability']) {
            $role->syncPermissions($request['ability']);
        }

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
    }
}
