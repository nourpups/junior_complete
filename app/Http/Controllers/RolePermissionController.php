<?php

namespace App\Http\Controllers;

use App\Actions\PrettifyWordsAction;
use App\Http\Requests\AddRolePermissionRequest;
use App\Http\Requests\StoreRolePermissionRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Role $role)
    {
       session(['index_page' => url()->full()]);

       $rolePermissions = $role->permissions()->paginate(15);

        return view('roles-permissions.index', compact('rolePermissions', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Role $role)
    {
        return view('roles-permissions.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolePermissionRequest $request, Role $role)
    {
        $role->permissions()->create($permission = $request->validated());

        return redirect(session('index_page'))->with('flash', [
              'class' => 'success',
              'message' => "Permission «$permission[name]» related to «$role[name]» role was created successfully"
        ]);
    }

   /**
    * Show the form for adding the existing permission or permissions to related role.
    */
    public function addForm(Role $role) {
       $rolePermissions = $role->permissions()->paginate(15);

       $permissions = Permission::get(['id', 'name']);

       return view('roles-permissions.add', compact('rolePermissions', 'role', 'permissions'));
    }

    /**
     * Add the existing permission or permissions to related role in storage.
     */
    public function add(AddRolePermissionRequest $request, Role $role, PrettifyWordsAction $prettifyWordsAction)
    {
       $permissionNames = $request->validated('permission_names');

        foreach ($permissionNames as $permissionName) {
            $role->givePermissionTo($permissionName);
        }

       $permissionNames = $prettifyWordsAction($permissionNames);

        return redirect(session('index_page'))->with('flash', [
              'class' => 'success',
              'message' => "Permission $permissionNames related to «$role[name]» role was added successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission);

       return redirect(session('index_page'))->with('flash', [
             'class' => 'danger',
             'message' => "Permission «$permission[name]» related to «$role[name]» role was revoked"
       ]);

    }
}
