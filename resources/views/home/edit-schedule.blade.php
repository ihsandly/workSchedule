@extends('layouts.template')
@section('content')
    <div class="p-2">
        <h2 class="mb-2 font-medium">Edit Schedule</h2>

        @if ($errors->any())
            <div class="flex p-4 mb-4 text-sm text-rose-700 rounded-lg bg-rose-100" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Danger</span>
                <div>
                    <span class="font-medium">Pastikan persyaratan berikut dipenuhi:</span>
                    <ul class="mt-1.5 list-disc list-inside">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="/schedules/update/{{ $data['id'] }}" method="POST">
            @csrf
            @method('PUT')

            <div class="my-2">
                <label class="ml-1" for="tanggal">Tanggal jadwal</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="tanggal" name="tanggal" type="date" value="{{ $data['tanggal'] }}"
                    placeholder="ketikkan nama lengkap">
            </div>

            <div class="my-2">
                <label class="ml-1" for="karyawan_id">Nama Karyawan</label>
                <input type="hidden" name="karyawan_id" value="{{ $data['karyawan_id'] }}">
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    readonly id="nama_karyawan" name="nama_karyawan" type="text"
                    value="{{ $data->karyawan->nama_karyawan }}" placeholder="ketikkan nama lengkap">
            </div>

            <div class="my-2">
                <label class="ml-1" for="posisi">Posisi</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="posisi" name="posisi" type="text" value="{{ $data['posisi'] }}"
                    placeholder="ketikkan posisi">
            </div>

            <div class="my-2">
                <label class="ml-1" for="jam_masuk">Jam Masuk</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="jam_masuk" name="jam_masuk" type="text" value="{{ $data['jam_masuk'] }}"
                    placeholder="ketikkan jam masuk">
            </div>

            <div class="my-2">
                <label class="ml-1" for="jam_pulang">Jam Pulang</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="jam_pulang" name="jam_pulang" type="text" value="{{ $data['jam_pulang'] }}"
                    placeholder="ketikkan jam pulang">
            </div>

            <button
                class="px-2 py-1 rounded-lg focus:outline-emerald-300 text-white bg-emerald-400 hover:bg-emerald-500 transition-all duration-300">Update</button>
        </form>
    </div>
@endsection
