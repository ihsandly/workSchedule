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
        $data = Karyawan::paginate($itemsPerPage);

        // Hitung offset untuk halaman saat ini
        $currentPage = $data->currentPage();
        $offset = ($currentPage - 1) * $itemsPerPage;
        return view('home.karyawan', ["no" => 0, "title" => "Data Karyawan", "data_karyawan" => $data, "offset" => $offset]);
    }

    public function delete($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect()->route('karyawan')
            ->with('success', 'Data berhasil dihapus.');
    }
}
