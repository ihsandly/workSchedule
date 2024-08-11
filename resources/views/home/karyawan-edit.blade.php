@extends('layouts.template')
@section('content')
    <div class="p-2">
        <h2 class="mb-2 font-medium">Edit data karyawan</h2>

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

        <form action="/karyawan/update/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-2">
                <label class="ml-1" for="nama_karyawan">Nama Lengkap</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="nama_karyawan" name="nama_karyawan" type="text" value="{{ $data['nama_karyawan'] }}"
                    placeholder="masukkan nama lengkap">
            </div>

            <div class="my-2">
                <label class="ml-1" for="nik">NIK</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="nik" name="nik" type="text" value="{{ $data['nik'] }}" placeholder="masukkan NIK">
            </div>

            <div class="my-2">
                <label class="ml-1" for="jabatan">Jabatan</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="jabatan" name="jabatan" type="text" value="{{ $data['jabatan'] }}"
                    placeholder="masukkan jabatan karyawan">
            </div>

            <div class="my-2">
                <label class="ml-1" for="nama_karyawan">Jenis Kelamin</label>
                <select
                    class="block focus:outline-blue-300 border border-slate-300 px-2 py-1 w-full rounded-lg text-gray-400"
                    name="jenis_kelamin" id="jenis_kelamin">
                    <option disabled selected value="">-- Harap Pilih Jenis
                        Kelamin --</option>
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">perempuan</option>
                </select>
            </div>

            <div class="my-2">
                <label class="ml-1" for="email">Email</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 rounded-lg w-full placeholder:text-gray-400"
                    id="email" name="email" type="text" value="{{ $data['email'] }}" placeholder="masukkan email">
            </div>

            <button
                class="px-2 py-1 rounded-lg focus:outline-emerald-300 text-white bg-emerald-400 hover:bg-emerald-500 transition-all duration-300">Submit</button>
        </form>
    </div>
@endsection
