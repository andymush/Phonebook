<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([$request->all()]);

        if (!Auth::attempt($request->only(['email','password']))) {
            return $this->error('','credentials dont match');
        }
        $user = User::where('email', $request->email)->first();
       
        

        $token = $request->user()->createToken('auth_token')->plainTextToken;

        return response()->json( [
            'token' => $token,
            'status' => 'true'
        ]);
    }

    public function register(Request $request)
    {
        //\Log::info("reg");
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        //event(new Registered($user));

        Auth::login($user);

        return response()->json( [
            'token' => $token,
            'status' => 'true'
        ]);
    
    }
}
