<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileDetailsRequest;
use App\Http\Requests\UpdateProfilePasswordRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function edit(User $user)
    {
       $user->load('media');

       return view('profiles.edit', compact('user'));
    }

    public function updateProfile(UpdateProfileDetailsRequest $request, User $user)
    {
        $data = $request->validated();
        $avatar = $data['image'];

        if($request->hasFile('image')) {
            $user->addMedia($avatar)
            ->usingFileName(Str::random(21).$avatar->extension())
            ->toMediaCollection('avatar');
        }

        unset($avatar);
        $user->update($data);

        return to_route('profiles.edit', $user)->with('flash', [
                'class' => 'success',
                'message' => 'Profile updated successfully'
        ]);
    }

    public function updatePassword(UpdateProfilePasswordRequest $request, User $user)
    {
       $user->update(['password' => Hash::make($request->validated('new_password'))]);

       return to_route('profiles.edit', $user)->with('flash', [
             'class' => 'success',
             'message' => 'Password updated successfully'
       ]);
    }

}
