@extends('layouts.template-employee')
@section('content-employee')
    <div class="p-2">
        <h2 class="mb-2 font-medium">Edit akun saya</h2>

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

        <form action="{{ url('/ubahdata') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-2">
                {{-- <label class="ml-1" for="name">Nama Lengkap</label> --}}
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="name" name="name" type="hidden" readonly value="{{ $data['name'] }}"
                    placeholder="ketikkan nama lengkap">
            </div>

            <div class="my-2">
                {{-- <label class="ml-1" for="nik">NIK</label> --}}
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="nik" name="nik" type="hidden" readonly value="{{ $data['nik'] }}"
                    placeholder="ketikkan NIK">

            </div>

            <div class="my-2">
                <label class="ml-1" for="email">Email</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="email" name="email" type="text" value="{{ $data['email'] }}" placeholder="ketikkan email">
            </div>

            <div class="my-2">
                {{-- role hidden --}}
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="role" name="role" type="hidden" readonly value="{{ $data['role'] }}"
                    placeholder="ketikkan role">
            </div>

            <div class="my-2">
                <label class="ml-1" for="password">Password</label>
                <input
                    class="block focus:outline-blue-300 px-2 py-1 border border-slate-300 placeholder:text-gray-400 rounded-lg w-full"
                    id="password" name="password" type="password" placeholder="ubah password">
            </div>

            <button
                class="px-2 py-1 rounded-lg focus:outline-emerald-300 text-white bg-emerald-400 hover:bg-emerald-500 transition-all duration-300">Update</button>
        </form>
    </div>
@endsection
