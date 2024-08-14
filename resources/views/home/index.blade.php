@extends('layouts.template')

@section('content')
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
            <a class="bg-blue-400 hover:bg-blue-500 transition-all duration-300 text-white px-2 py-1 rounded-lg text-sm"
                href="{{ url('/tambahschedule') }}">
                Tambah schedule
            </a>

            <form class="flex justify-center items-center gap-1.5" action="{{ route('schedules.sortByDate') }}"
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
                        <td class="font-medium p-2 rounded-tr-lg">Aksi</td>
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
                            <td class="p-2 rounded-br-lg">
                                <div class="flex justify-start items-center gap-1.5 w-full">
                                    <a class="bg-amber-200 hover:bg-amber-400 transition-all duration-300 p-1 rounded-lg"
                                        href="/schedules/edit/{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4 text-amber-700">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <a onclick="return confirm('Apakah anda yakin?')"
                                        class="bg-rose-200 hover:bg-rose-400 transition-all duration-300 p-1 rounded-lg"
                                        href="/hapusschedule/{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4 text-rose-700">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center p-2" colspan="9">data tidak ditemukan.</td>
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
