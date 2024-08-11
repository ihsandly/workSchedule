@extends('layouts.template')

@section('content')
    <div class="p-2">
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
                    <tr class="odd:bg-slate-50 even:bg-slate-200">
                        <td class="text-center font-medium p-2 rounded-tl-lg">No</td>
                        <td class="font-medium p-2">NIK</td>
                        <td class="font-medium p-2">Nama</td>
                        <td class="font-medium p-2">Posisi</td>
                        <td class="font-medium p-2">Jabatan</td>
                        <td class="font-medium p-2 rounded-tr-lg">Aksi</td>
                    </tr>
                </tbody>
            </table>
            <div class="my-4">
            </div>
        </div>
    </div>
@endsection
