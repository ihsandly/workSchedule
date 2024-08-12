<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        // Ambil data dengan paginasi
        $itemsPerPage = 20;
        $data = Schedule::whereDate('tanggal', now())->paginate($itemsPerPage);

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

    public function tambah()
    {
        $nama_karyawan = Karyawan::all();
        return view('home.tambah-schedule', compact('nama_karyawan'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'karyawan_id' => 'required',
                'posisi' => 'required',
                'tanggal' => 'required',
                'jam_masuk' => 'required',
                'jam_pulang' => 'required',
            ],
            [
                'karyawan_id.required' => 'Nama karyawan wajib dipilih.',
                'posisi.required' => 'Posisi wajib diisi.',
                'tanggal.required' => 'tanggal wajib dipilih.',
                'jam_masuk.required' => 'Jam masuk wajib diisi.',
                'jam_pulang.required' => 'jam pulang wajib diisi.',
            ]
        );

        $data = [
            'karyawan_id' => $request->input('karyawan_id'),
            'posisi' => $request->input('posisi'),
            'tanggal' => $request->input('tanggal'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_pulang' => $request->input('jam_pulang'),
        ];

        $exists = Schedule::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal', $request->tanggal)
            ->exists();

        if ($exists) {
            return back()->withErrors(['karyawan_id' => 'Karyawan ini sudah memiliki jadwal pada tanggal yang dipilih.']);
        }

        Schedule::create($data);
        return redirect('/')->with('success', ' Berhasil menambahkan data schedule baru.');
    }

    public function edit($id)
    {
        $data = Schedule::where('id', $id)->first();
        return view('home.edit-schedule', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'karyawan_id' => 'required',
                'posisi' => 'required',
                'tanggal' => 'required|date',
                'jam_masuk' => 'required|max_digits:2',
                'jam_pulang' => 'required|max_digits:2',
            ],
            [
                'karyawan_id.required' => 'Karyawan wajib diisi.',
                'posisi.required' => 'Posisi wajib diisi.',
                'tanggal.required' => 'Tanggal wajib diisi.',
                'jam_masuk.required' => 'Jam Masuk wajib diisi.',
                'jam_masuk.max_digits' => 'Jam Masuk maksimal 2 digit.',
                'jam_pulang.required' => 'Jam Pulang wajib diisi.',
                'jam_pulang.max_digits' => 'Jam Pulang maksimal 2 digit.',
            ]
        );

        $data = [
            'karyawan_id' => $request->input('karyawan_id'),
            'posisi' => $request->input('posisi'),
            'tanggal' => $request->input('tanggal'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_pulang' => $request->input('jam_pulang'),
        ];

        Schedule::where('id', $id)->update($data);
        return redirect('/')->with('success', ' Berhasil mengubah schedule data.');
    }

    public function delete($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect()->route('schedule')
            ->with('success', 'Data schedule berhasil dihapus.');
    }
}
