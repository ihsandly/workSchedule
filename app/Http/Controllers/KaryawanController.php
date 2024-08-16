<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function karyawan()
    {
        // Ambil data dengan paginasi
        $itemsPerPage = 10;
        $data = Karyawan::latest()->paginate($itemsPerPage);

        // Hitung offset untuk halaman saat ini
        $currentPage = $data->currentPage();
        $offset = ($currentPage - 1) * $itemsPerPage;
        return view('home.karyawan', ["no" => 0, "title" => "Data Karyawan", "data_karyawan" => $data, "offset" => $offset]);
    }

    public function tambah()
    {
        return view('home.karyawan-tambah', [
            "title" => "Tambah data karyawan",
            1
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nik' => 'required|unique:karyawan,nik|max_digits:16',
                'nama_karyawan' => 'required',
                'jabatan' => 'required',
                'jenis_kelamin' => 'required',
                'email' => 'required',

            ],
            [
                'nik.required' => 'NIK wajib diisi.',
                'nik.unique' => 'NIK sudah digunakan.',
                'nik.max_digits' => 'NIK maksimal 16 angka.',
                'nama_karyawan.required' => 'Nama Karyawan wajib diisi.',
                'jabatan.required' => 'Jabatan Karyawan wajib diisi.',
                'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi.',
                'email.required' => 'Email wajib diisi.'
            ]
        );

        $data = [
            'nik' => $request->input('nik'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'jabatan' => $request->input('jabatan'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'email' => $request->input('email'),
        ];



        Karyawan::create($data);
        User::create([
            'name' => $request->input('nama_karyawan'),
            'email' => $request->input('email'),
            'nik' => $request->input('nik'),
            'password' => bcrypt('123456'),
            'role' => 'non_admin',
        ]);
        return redirect('/karyawan')->with('success', ' Berhasil menambahkan data baru.');
    }

    public function edit($id)
    {
        $data = Karyawan::where('id', $id)->first();
        return view('home.karyawan-edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $nikLama = Karyawan::where('id', $id)->first();
        if ($nikLama->nik == $request->input('nik')) {
            $ruleNik = 'required';
        } else {
            $ruleNik = 'required|unique:karyawan,nik|max_digits:16';
        }

        $request->validate(
            [
                'nik' => $ruleNik,
                'nama_karyawan' => 'required',
                'jabatan' => 'required',
                'jenis_kelamin' => 'required',
            ],
            [
                'nik.required' => 'NIK wajib diisi.',
                'nik.unique' => 'NIK sudah digunakan.',
                'nik.max_digits' => 'NIK maksimal 16 angka.',
                'nama_karyawan.required' => 'Nama Karyawan wajib diisi.',
                'jabatan.required' => 'Jabatan Karyawan wajib diisi.',
                'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi.',
            ]
        );

        $data = [
            'nik' => $request->input('nik'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'jabatan' => $request->input('jabatan'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
        ];

        Karyawan::where('id', $id)->update($data);
        return redirect('/karyawan')->with('success', ' Berhasil mengubah data.');
    }

    public function delete($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect()->route('karyawan')
            ->with('success', 'Data berhasil dihapus.');
    }

    public function akun()
    {
        // Ambil data dengan paginasi
        $itemsPerPage = 10;
        $data = User::latest()->paginate($itemsPerPage);

        // Hitung offset untuk halaman saat ini
        $currentPage = $data->currentPage();
        $offset = ($currentPage - 1) * $itemsPerPage;
        return view('home.akun.akun', ["no" => 0, "title" => "Data Karyawan", "data_karyawan" => $data, "offset" => $offset]);
    }

    public function tambahAkun()
    {
        $karyawan = Karyawan::all();
        return view('home.akun.tambah', ['karyawan' => $karyawan]);
    }

    public function storeAkun(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'nik' => 'required|unique:users,nik',
                'role' => 'required',
                'email' => 'required|unique:users,email',
            ],
            [
                'name.required' => 'Nama wajib diisi.',
                'nik.required' => 'NIK wajib diisi.',
                'nik.unique' => 'NIK sudah digunakan.',
                'role.required' => 'role wajib diisi.',
                'email.required' => 'email wajib diisi.',
                'email.unique' => 'email sudah digunakan.',
            ]
        );

        $data = [
            'name' => $request->input('name'),
            'nik' => $request->input('nik'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => bcrypt('123456'),
        ];

        User::create($data);
        return redirect('/akun')->with('success', ' Berhasil menambahkan akun baru.');
    }

    public function updateAkun(Request $request, $id)
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

        User::where('id', $id)->update($data);
        return redirect('/akun')->with('success', ' Berhasil mengubah data.');
    }

    public function editAkun($id)
    {
        $data = User::where('id', $id)->first();
        return view('home.akun.edit')->with('data', $data);
    }

    public function hapusAkun($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('akun')
            ->with('success', 'Data berhasil dihapus.');
    }
}
