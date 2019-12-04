<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $profile = Profile::where('user_id', $user->id)->firstOrFail();
        return view('profile.show', ['profile' => $profile]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', ['profile' => $user->profile]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'image' => 'nullable|image|max:2000',
            'info' => 'nullable'
        ]);

        $user->profile->info = $request->info;
        if ($request->hasFile('image'))
        {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid() . '.' . $ext;
            $image->storeAs('public/imgs', $filename);

            if ($user->profile->image != 'default.png')
            {
                Storage::delete('public/imgs/' . $user->image);
            }

            $user->profile->image = $filename;
        }

        $user->profile->save();

        return redirect($user->profile->path());
    }
}
