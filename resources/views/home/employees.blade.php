@extends('layouts.template-employee')
@section('content-employee')
    <div class="p-2">
        <h2 class="mb-2 font-medium">Jadwal karyawan</h2>

        @if ($message = Session::get('success'))
            <div
                class="mb-2 bg-teal-200 px-2 py-1.5 rounded-lg flex items-center justify-start gap-1.5 text-xs text-teal-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-3.5">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                        clip-rule="evenodd" />
                </svg>
                <p>{{ $message }}</p>
            </div>
        @endif

        {{-- tambah data --}}
        <div class="flex justify-between items-center">
            <form class="flex justify-center items-center gap-1.5" action="{{ route('employee.sortByDate') }}"
                method="GET">
                <input class="px-2 py-0.5 rounded-lg bg-slate-200 hover:bg-slate-300 transtion-all duration-300 "
                    type="date" name="tanggal">
                <button
                    class="bg-teal-200 hover:bg-teal-300 transtion-all duration-300 flex items-center justify-center gap-1.5 px-2 py-1 rounded-lg"
                    type="submit">
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
                        <td class="font-medium p-2">Tanggal</td>
                        <td class="font-medium p-2">NIK</td>
                        <td class="font-medium p-2">Nama</td>
                        <td class="font-medium p-2">Jam Masuk</td>
                        <td class="font-medium p-2">Jam Pulang</td>
                        <td class="font-medium p-2">Posisi</td>
                        <td class="font-medium p-2">Jabatan</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr class="odd:bg-slate-50 even:bg-slate-200">
                            <td class="text-center p-2 rounded-bl-lg">{{ $offset + $loop->iteration }}</td>
                            <td class="p-2">{{ date('l, d F Y', strtotime($item->tanggal)) }}</td>
                            <td class="p-2">{{ $item->karyawan->nik }}</td>
                            <td class="p-2">{{ $item->karyawan->nama_karyawan }}</td>
                            <td class="p-2">{{ $item->jam_masuk }}</td>
                            <td class="p-2">{{ $item->jam_pulang }}</td>
                            <td class="p-2">{{ $item->posisi }}</td>
                            <td class="p-2">{{ $item->karyawan->jabatan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center p-2" colspan="8">data tidak ditemukan.</td>
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
