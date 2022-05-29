<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => ['exists:user,name'],
            'email' => ['exists:user,email'],
            'new_password' => [ 'nullable', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable','mimes:jpg,jpeg,png,bmp,gif,svg,webp','max:2048'],
            
        ]);

        $data = $request->all();

        if (isset($data['avatar'])) {

            if ($user->avatar) {
                Storage::delete($user->avatar);
            }

            $img_user = Storage::put('img_users', $data['avatar']);
            $data['avatar'] = $img_user;
        }

        if ($data['new_password']) {
            $new_password = Hash::make($data['new_password']);
            $data['password'] = $new_password;
        }

        $user->update($data);
        return redirect()->route('admin.home')->with('message', 'Profile updated with success');
    }
}
