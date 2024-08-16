<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
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

        // Ambil data dengan paginasi
        $itemsPerPage = 20;

        $userNik = Auth::user()->nik; // Mendapatkan NIK dari user yang sedang login

        $data = Schedule::whereHas('karyawan', function ($query) use ($userNik) {
            $query->where('nik', $userNik);
        })->paginate($itemsPerPage);

        // Hitung offset untuk halaman saat ini
        $currentPage = $data->currentPage();
        $offset = ($currentPage - 1) * $itemsPerPage;
        return view('home.employees', ["data" => $data, 'offset' => $offset]);
    }

    public function ubahDataAkun()
    {
        $data = User::where('id', Auth::user()->id)->first();
        return view('home.akun-employee.ubahdataakun')->with('data', $data);
    }

    public function updateDataAkun(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'nik' => 'required',
                'role' => 'required',
                'password' => 'required',
            ],
            [
                'name.required' => 'Nama Lengkap wajib diisi.',
                'nik.required' => 'NIK wajib diisi.',
                'role.required' => 'Role wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'password.required' => 'Password wajib diisi.',
            ]
        );

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'nik' => $request->input('nik'),
            'role' => $request->input('role'),
            'password' => bcrypt($request->input('password')),
        ];

        User::where('id', Auth::user()->id)->update($data);
        return redirect('/ubahdataakun')->with('success', ' Berhasil mengubah data.');
    }

    public function employeesSortByDate(Request $request)
    {
        // Ambil data dengan paginasi
        $itemsPerPage = 20;

        // Ambil tanggal dari input
        $date = $request->input('tanggal');

        // Query data Schedule yang diurutkan berdasarkan tanggal yang dipilih
        $userNik = Auth::user()->nik; // Mendapatkan NIK dari user yang sedang login

        $data = Schedule::whereHas('karyawan', function ($query) use ($userNik) {
            $query->where('nik', $userNik);
        })->where('tanggal', $date)->paginate($itemsPerPage);

        // Hitung offset untuk halaman saat ini
        $currentPage = $data->currentPage();
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Kembalikan ke view dengan data yang sudah disortir
        return view('home.employees', compact('data', 'date', 'offset'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Bye 👋, sampai jumpa.');
    }
}
