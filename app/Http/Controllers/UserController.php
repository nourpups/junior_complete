<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session(['previous_page' => url()->full()]);
        $users = User::latest()->paginate(12);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create($user = $request->validated());

        return redirect(session('previous_page'))->with('flash', [
            'class' => 'success',
            'message' => "User $user[name] was created successfully"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if(isset($data['password']))
        {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect(session('previous_page'))->with('flash', [
            'class' => 'success',
            'message' => "User $user[name] was updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $name = $user->name;
        $user->delete();

        return redirect(session('previous_page'))->with('flash', [
            'class' => 'danger',
            'message' => "User $user[name] was deleted"
        ]);
    }
}
