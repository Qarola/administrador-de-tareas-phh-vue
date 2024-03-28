<?php

 /**namespace App\Http\Controllers;*/

 /**use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     
    public function showAuthenticatedUser(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Update the authenticated user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'sometimes|required|string|min:6',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return response()->json($user);
    }
}*/