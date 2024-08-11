<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

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
                'email' => 'required|email',
            ],
            [
                'nik.required' => 'NIK wajib diisi.',
                'nik.unique' => 'NIK sudah digunakan.',
                'nik.max_digits' => 'NIK maksimal 16 angka.',
                'nama_karyawan.required' => 'Nama Karyawan wajib diisi.',
                'jabatan.required' => 'Jabatan Karyawan wajib diisi.',
                'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi.',
                'email.required' => 'email wajib diisi.',
                'email.email' => 'gunakan format email yang benar.',
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
                'email' => 'required|email',
            ],
            [
                'nik.required' => 'NIK wajib diisi.',
                'nik.unique' => 'NIK sudah digunakan.',
                'nik.max_digits' => 'NIK maksimal 16 angka.',
                'nama_karyawan.required' => 'Nama Karyawan wajib diisi.',
                'jabatan.required' => 'Jabatan Karyawan wajib diisi.',
                'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi.',
                'email.required' => 'email wajib diisi.',
                'email.email' => 'gunakan format email yang benar.',
            ]
        );

        $data = [
            'nik' => $request->input('nik'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'jabatan' => $request->input('jabatan'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'email' => $request->input('email'),
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
}
