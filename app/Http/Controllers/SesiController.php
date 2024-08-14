<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('sesi.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Gunakan format email yang benar.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/')->with('success', 'Halo 👋, selamat datang.');
            } elseif (Auth::user()->role == 'non_admin') {
                return redirect('/employee')->with('success', 'Halo 👋, selamat datang.');
            } else {
                return redirect('/login')->withErrors('Role login bermasalah');
            }
        } else {
            return redirect('/login')->withErrors('Email atau password salah.');
        }
    }

    public function nonAdmin()
    {
        // Ambil data dengan paginasi
        $itemsPerPage = 20;
        $data = Schedule::whereDate('tanggal', now())->paginate($itemsPerPage);

        // Hitung offset untuk halaman saat ini
        $currentPage = $data->currentPage();
        $offset = ($currentPage - 1) * $itemsPerPage;
        return view('home.employee', ["data" => $data, 'offset' => $offset]);
    }

    public function sortByDate(Request $request)
    {
        // Ambil data dengan paginasi
        $itemsPerPage = 20;
        $data = Schedule::paginate($itemsPerPage);

        // Hitung offset untuk halaman saat ini
        $currentPage = $data->currentPage();
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Ambil tanggal dari input
        $date = $request->input('tanggal');

        // Query data Schedule yang diurutkan berdasarkan tanggal yang dipilih
        $data = Schedule::whereDate('tanggal', $date)->paginate($itemsPerPage);

        // Kembalikan ke view dengan data yang sudah disortir
        return view('home.employee', compact('data', 'date', 'offset'));
    }

    public function employees()
    {
        // user aktif
        $user = Auth::user();

        // Ambil data dengan paginasi
        $itemsPerPage = 20;
        $data = Schedule::where('karyawan_id', 1)->paginate($itemsPerPage);

        // Hitung offset untuk halaman saat ini
        $currentPage = $data->currentPage();
        $offset = ($currentPage - 1) * $itemsPerPage;
        return view('home.employees', ["data" => $data, 'offset' => $offset]);
        return dd($user->karyawan_id);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Bye 👋, sampai jumpa.');
    }
}
