<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        // Ambil data dengan paginasi
        $itemsPerPage = 20;
        $data = Schedule::paginate($itemsPerPage);

        // Hitung offset untuk halaman saat ini
        $currentPage = $data->currentPage();
        $offset = ($currentPage - 1) * $itemsPerPage;
        return view('home.index', ["data" => $data, 'offset' => $offset]);
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
        return view('home.index', compact('data', 'date', 'offset'));
    }
}
