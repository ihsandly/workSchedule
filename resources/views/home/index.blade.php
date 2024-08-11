@extends('layouts.template')

@section('content')
    <div class="p-2">

        <h2 class="mb-2 font-medium">Jadwal karyawan</h2>

        {{-- tambah data --}}
        <div class="flex justify-between items-center">
            <a class="bg-blue-400 hover:bg-blue-500 transition-all duration-300 text-white px-2 py-1 rounded-lg text-sm"
                href="{{ url('/tambahschedule') }}">
                Tambah schedule
            </a>
            <form class="flex justify-center items-center gap-1.5" action="{{ route('schedules.sortByDate') }}""
                method="GET">
                <input class="px-2 py-0.5 rounded-lg bg-slate-200" type="date" name="tanggal">
                <button class="bg-teal-200 flex items-center justify-center gap-1.5 px-2 py-1 rounded-lg" type="submit"
                    name="submit">
                    Cari
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 h-full">
                        <path fill-rule="evenodd"
                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="mt-2 overflow-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-slate-500 text-white">
                        <td class="text-center font-medium p-2 rounded-tl-lg">No</td>
                        <td class="font-medium p-2">NIK</td>
                        <td class="font-medium p-2">Nama</td>
                        <td class="font-medium p-2">Posisi</td>
                        <td class="font-medium p-2">Jabatan</td>
                        <td class="font-medium p-2 rounded-tr-lg">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr class="odd:bg-slate-50 even:bg-slate-200">
                            <td class="text-center p-2 rounded-bl-lg">{{ $offset + $loop->iteration }}</td>
                            <td class="p-2">{{ $item->karyawan->nik }}</td>
                            <td class="p-2">{{ $item->karyawan->nama_karyawan }}</td>
                            <td class="p-2">{{ $item->posisi }}</td>
                            <td class="p-2">{{ $item->karyawan->jabatan }}</td>
                            <td class="p-2 rounded-br-lg">Aksi</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center p-2" colspan="6">data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="my-4">
                {{ $data->links('pagination::simple-tailwind') }}
            </div>
        </div>
    </div>
@endsection
