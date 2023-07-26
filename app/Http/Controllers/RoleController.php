<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

   public function __construct()
   {
      $this->authorizeResource(Role::class, 'role');
   }

   /**
     * Display a listing of the resource.
     */
    public function index()
    {

       session(['index_page' => url()->full()]);
       session(['parent_index_page' => url()->full()]);

       $roles = Role::latest()->paginate(12);

       return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
       $role = Role::create($request->validated());

       return redirect(session('index_page'))->with('flash', [
             'class' => 'success',
             'message' => "Role «$role[name]» was created successfully"
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', $role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($role = $request->validated());

       return redirect(session('index_page'))->with('flash', [
             'class' => 'success',
             'message' => "Role «$role[name]» was updated successfully"
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
       $role->delete();

       return redirect(session('index_page'))->with('flash', [
             'class' => 'danger',
             'message' => "Role «$role[name]» was deleted"
       ]);
    }
}
