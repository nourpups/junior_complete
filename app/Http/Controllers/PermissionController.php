<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
   public function __construct()
   {
      $this->authorizeResource(Permission::class, 'permission');
   }

   /**
     * Display a listing of the resource.
     */
    public function index()
    {
       session(['index_page' => url()->full()]);

       $permissions = Permission::latest()->paginate(20);

        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
      $permission = Permission::create($request->validated());

     return redirect(session('index_page'))->with('flash', [
           'class' => 'success',
           'message' => "Permission «$permission[name]» was created successfully"
     ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
       $permission->update($permission = $request->validated());

        return redirect(session('index_page'))->with('flash', [
              'class' => 'success',
              'message' => "Permission «$permission[name]» was updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

       return redirect(session('index_page'))->with('flash', [
             'class' => 'success',
             'message' => "Project «$permission[name]» was updated successfully"
       ]);
    }
}
