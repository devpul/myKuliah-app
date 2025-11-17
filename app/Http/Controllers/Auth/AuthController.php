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
                    'nomor_mahasiswa' => 'required|unique:users,mahasiswa_id|string',
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
            'mahasiswa_id' =>  $validated['nomor_mahasiswa'],
            'name'      =>  $validated['name'],
            'password'  =>  Hash::make($validated['password']),
            'email'     =>  $validated['email'],
        ]);


        return redirect()->route('login')
                        ->with('success', 'Berhasil membuat akun');
    }

    public function indexLogin()
    {
        return view('Auth.Auth');
    }

    public function indexRegister()
    {
        return view('Auth.Auth');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($validated)) {
            return back()->with('failed', 'Kamu belum login');
        }            

        if (Auth::attempt($validated)) {

            $request->session()->regenerate();

            return redirect()->route('dashboard')
                            ->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
