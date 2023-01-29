<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
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

        foreach ($request->ability as $value) {
            $role->allowTo((int)$value);
        }
        return redirect()->route('roles.index');
    }


    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request['name'],
        ]);

        $role->permissions()->detach();

        if ($request['ability']) {
            foreach ($request['ability'] as $value) {
                $role->allowTo((int)$value);
            }
        }

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->deleteRole();
        return redirect()->route('roles.index');
    }
}
