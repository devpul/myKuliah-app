<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function validateUser(Request $request)
    {
        try {
                
                return $request->validate([
                    'name' => 'required|string',         
                    'password' => 'required|string',         
                    'email' => 'required|unique:users,email|email',         
                ]);

        } catch (ValidationException $e) {

            $errors = $e->errors();
            return back()->with('error', $errors);
        }
    }

    public function register(Request $request)
    {
        $validated = $this->validateUser($request);

        if (! is_array ($validated)) {
            return $validated;
        }

        $user = User::create([
            'role_id'   =>  1,  //admin
            'name'      =>  $validated['name'],
            'password'  =>  Hash::make($validated['password']),
            'email'     =>  $validated['email'],
            'address'   =>  null,
            'image'     =>  null,
        ]);

        return redirect()->route('index_login')
                        ->with('success', 'Berhasil membuat akun');
    }

    public function indexLogin()
    {
        return view('Auth.Login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($validated)) {
            return redirect()->route('login')->with('failed', 'Harap login terlebih dahulu');
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Login successful!');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
