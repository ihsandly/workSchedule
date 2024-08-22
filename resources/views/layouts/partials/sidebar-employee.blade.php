<aside class="w-64 fixed top-0 left-0 bottom-0 bg-slate-100">
    <div class="relative h-full flex flex-col mx-3 my-2 space-y-1.5">
        <h1 class="mb-2 font-medium px-1.5">Work Schedule</h1>
        <a class="hover:bg-slate-300 focus:ring-2 focus:outline-none focus:ring-slate-600 transtion-all duration-300 px-1.5 py-1 rounded-lg flex items-center gap-x-1.5"
            href="{{ url('/employee') }}">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
            </span>Jadwal Karyawan</a>
        <a class="hover:bg-slate-300 focus:ring-2 focus:outline-none focus:ring-slate-600 transtion-all duration-300 px-1.5 py-1 rounded-lg flex items-center gap-x-1.5"
            href="{{ url('/myschedules') }}">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </span>Jadwal Saya</a>
        {{-- <a class="hover:bg-slate-300 focus:ring-2 focus:outline-none focus:ring-slate-600 transtion-all duration-300 px-1.5 py-1 rounded-lg flex items-center gap-x-1.5"
            href="#">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                </svg>
            </span>Perubahan Jadwal</a> --}}
        <a class="bg-sky-200 focus:ring-2 focus:outline-none focus:ring-sky-600 transtion-all duration-300 px-1.5 py-1 rounded-lg flex items-center gap-x-1.5"
            href="{{ url('/ubahdataakun') }}">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
            </span>Ubah Password</a>
        <a class="absolute bottom-[20px] focus:ring-2 focus:outline-none focus:ring-rose-600 right-0 left-0 w-full bg-red-100 hover:bg-red-200 text-red-700 transition-all duration-300 px-1.5 py-1 rounded-lg flex items-center gap-x-1.5"
            href="{{ url('/logout') }}">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>
            </span>Logout</a>
    </div>
</aside>
