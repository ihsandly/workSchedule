@extends('layouts.template')
@section('content')
    <div class="p-2">
        <h2 class="mb-2 font-medium">{{ $title }}</h2>

        <form action="" method="POST">
            @csrf

            <div class="my-2">
                <label class="ml-1" for="nama_karyawan">Nama Lengkap</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="nama_karyawan" name="nama_karyawan" type="text" placeholder="masukkan nama lengkap">
            </div>

            <div class="my-2">
                <label class="ml-1" for="posisi">Posisi</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="posisi" name="posisi" type="text" placeholder="masukkan posisi karyawan">
            </div>

            <div class="my-2">
                <label class="ml-1" for="nama_karyawan">Jenis Kelamin</label>
                <select
                    class="block focus:outline-blue-300 border border-slate-300 px-2 py-1 w-full rounded-lg text-gray-400"
                    name="jenis_kelamin" id="jenis_kelamin">
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">perempuan</option>
                </select>
            </div>

            <div class="my-2">
                <label class="ml-1" for="email">Email</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 rounded-lg w-full placeholder:text-gray-400"
                    id="email" name="email" type="email" placeholder="masukkan email">
            </div>

            <button
                class="px-2 py-1 rounded-lg focus:outline-emerald-300 text-white bg-emerald-400 hover:bg-emerald-500 transition-all duration-300">Submit</button>
        </form>
    </div>
@endsection
