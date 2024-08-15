@extends('layouts.template')
@section('content')
    <div class="p-2">
        <h2 class="mb-2 font-medium">Tambah akun</h2>

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

        <form action="{{ route('tambah_akun') }}" method="POST">
            @csrf

            <div class="my-2">
                <label class="ml-1" for="name">Nama Lengkap</label>
                <select
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    name="name" id="name">
                    <option selected disabled value="">-- Harap Dipilih --</option>
                    @forelse ($karyawan as $item)
                        <option value="{{ $item['nama_karyawan'] }}">{{ $item['nama_karyawan'] }}</option>
                    @empty
                        <option selected disabled value="">-- Data Karyawan Tidak Ada --</option>
                    @endforelse
                </select>
            </div>

            <div class="my-2">
                <label class="ml-1" for="nik">NIK</label>
                <select
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    name="nik" id="nik">
                    <option selected disabled value="">-- Harap Dipilih --</option>
                    @forelse ($karyawan as $item)
                        <option value="{{ $item['nik'] }}">{{ $item['nik'] }}</option>
                    @empty
                        <option selected disabled value="">-- Data NIK Karyawan Tidak Ada --</option>
                    @endforelse
                </select>
            </div>

            <div class="my-2">
                <label class="ml-1" for="role">Role</label>
                <select
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    name="role" id="role">
                    <option disable selected value="">-- Harap Dipilh --</option>
                    <option value="non_admin">Non Admin</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="my-2">
                <label class="ml-1" for="email">Email</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 rounded-lg w-full placeholder:text-gray-400"
                    id="email" name="email" type="email" value="{{ old('email') }}" placeholder="ketikkan email">
            </div>

            <button
                class="px-2 py-1 rounded-lg focus:outline-emerald-300 text-white bg-emerald-400 hover:bg-emerald-500 transition-all duration-300">Submit</button>
        </form>
    </div>
@endsection
