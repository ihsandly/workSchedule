@extends('layouts.template-sesi')

@section('content-sesi')
    <div class="flex justify-center items-center mt-16 container mx-auto max-w-[320px]">
        <form action="" method="POST" class="bg-white w-full px-6 py-4 rounded-lg shadow-md">
            @csrf
            <h1 class="text-center font-medium mb-3">Login Work Schedule</h1>

            @if ($errors->any())
                <div class="flex p-4 mb-4 text-sm text-rose-700 rounded-lg bg-rose-100" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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

            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input autofocus type="email" id="email" name="email" value="{{ old('email') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:outline-sky-300 block w-full p-1"
                    placeholder="example@gmail.com" />
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" id="password" name="password" placeholder="********"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:outline-sky-300 block w-full p-1" />
            </div>
            <button type="submit" name="submit"
                class="text-white bg-sky-500 transition-all duration-300 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-2 py-1.5 text-center">Login</button>
        </form>
    </div>
@endsection
