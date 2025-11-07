<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SystemController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Cari user di tabel login
        $user = DB::table('login')->where('username', $username)->first();

        if ($user) {
            // Cek password langsung (tanpa Hash)
            if ($user->password === $password) {
                // Simpan data ke session
                Session::put('username', $user->username);
                Session::put('role', $user->role);

                // Redirect sesuai role
                if ($user->role === 'admin') {
                    return redirect('/admin/dashboard');
                } else if ($user->role === 'user') {
                    return redirect('/user/dashboard');
                }
            } else {
                return back()->with('error', 'Password salah!');
            }
        } else {
            return back()->with('error', 'Username tidak ditemukan!');
        }
    }

    public function userDashboard()
    {
        $username = Session::get('username');
        return view('user.dashboard_user', compact('username'));
    }
}
