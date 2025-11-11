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
        // 1️⃣ Validasi input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($validated)) {
            return back()->with('failed', 'Kamu belum login');
        }            

        if (Auth::attempt($validated)) {
            // 3️⃣ Regenerasi session ID (keamanan)
            $request->session()->regenerate();

            // 4️⃣ Redirect ke halaman setelah login sukses
            return redirect()->route('dashboard')
                            ->with('success', 'Login successful!');
        }

        // 5️⃣ Kalau gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index_login')->with('success', 'Berhasil logout.');
    }
}
