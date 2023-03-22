<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 border-b border-gray-200 dark:border-gray-700 ">
                    <div class="text-center font-bold decoration-sky-500/30 text-gray-900 dark:text-gray-100 ">
                        {{ config('app.name') }}
                    </div>
                </div>
                <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                      </svg>

                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        @if (auth()->user()->role_id == 1)
                                            <a href="{{ route('admin.subjects.index') }}" class="underline-none text-gray-900 dark:text-white">
                                                Mata Pelajaran
                                            </a>
                                        @elseif (auth()->user()->role_id == 2)
                                            <a href="{{ route('teacher.sheduleSubject.index') }}" class="underline-none text-gray-900 dark:text-white">
                                                Jadwal Mata Pelajaran
                                            </a>
                                        @else
                                            <a href="{{ route('student.subjects.index') }}" class="underline-none text-gray-900 dark:text-white">
                                                Jadwal Mata Pelajaran
                                            </a>
                                        @endif

                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="indent-8 mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        Berisikan Jadwal Mata pelajaran, seperti: data mata pelajaran,
                                        Hari Pengajaran, kelas yang dimiliki
                                        dan guru Pengajar
                                    </div>
                                </div>
                            </div>

                            @if (auth()->user()->role_id == 1)
                                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                          </svg>


                                        <div class="ml-4 text-lg leading-7 font-semibold">
                                            <a href="{{ route('admin.users.index') }}" class="underline-none text-gray-900 dark:text-white">
                                                Users
                                            </a>
                                        </div>
                                    </div>

                                    <div class="ml-12">
                                        <div class="indent-8 mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                            Berisikan Data Kepemilikan user, seperti: data diri user,
                                            nama jabatan yang dimiliki serta kelas yang dimiliki
                                        </div>
                                    </div>
                                </div>

                            @endif

                            @if (auth()->user()->role_id == 3)
                                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                        </svg>

                                        <div class="ml-4 text-lg leading-7 font-semibold">
                                            <a href="{{ route('student.attendances.index') }}" class="underline-none text-gray-900 dark:text-white">
                                                Presensi Absen
                                            </a>
                                        </div>
                                    </div>

                                    <div class="ml-12">
                                        <div class="indent-8 mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                            Berisikan Presensi Absen, seperti: data mata pelajaran,
                                            Hari Pengajaran, guru Pengajar, kelas yang dimiliki, dan keterangan kehadiran
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (auth()->user()->role_id == 2)
                                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                        </svg>

                                        <div class="ml-4 text-lg leading-7 font-semibold">
                                            <a href="{{ route('teacher.presences.index') }}" class="underline-none text-gray-900 dark:text-white">
                                                Presensi Absen
                                            </a>
                                        </div>
                                    </div>

                                    <div class="ml-12">
                                        <div class="indent-8 mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                            Berisikan Presensi Absen, seperti: data mata pelajaran,
                                            Hari Pengajaran, guru Pengajar, kelas yang dimiliki, dan keterangan kehadiran
                                        </div>
                                    </div>
                                </div>
                            @endif


                        @if (auth()->user()->role_id == 1)
                            <div class="w-full p-6 border-t justify-center border-gray-200 dark:border-gray-700">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        <a href="{{ route('admin.administrations.index') }}" class="underline-none text-gray-900 dark:text-white">
                                            Administrasi Pembelajaran
                                        </a>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="indent-8 mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        Berisikan Tentang Administrasi Pembelajaran Guru, Seperti: Mata Pelajaran, judul materi,
                                        Guru yang ngejajar serta komentar yang diberikan oleh terhadap administrasi pengajaran.
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (auth()->user()->role_id == 1)
                            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                      </svg>

                                    <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                                        <a href="{{ route('admin.classrooms.index') }}" class="underline-none">
                                            Kelas
                                        </a>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="indent-8 mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        Berisikan Tentang Data Kelas(Siswa, wali Kelas),
                                        serta mata pelajaran yang dimiliki.
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                    @if (auth()->user()->role_id == 2)
                    <div class="w-full p-6 border-t inline-block border-gray-200 dark:border-gray-700">
                        <div class="flex justify-left">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="{{ route('teacher.administrations.index') }}" class="underline-none text-gray-900 dark:text-white">
                                    Administrasi Pembelajaran
                                </a>
                            </div>
                        </div>

                        <div class="ml-12 inline-block">
                            <div class="indent-8 mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Berisikan Tentang Administrasi Pembelajaran Guru, Seperti: Mata Pelajaran, judul materi,
                                Guru yang ngejajar serta komentar yang diberikan oleh terhadap administrasi pengajaran.
                            </div>
                        </div>
                    </div>
                    @endif
            </div>
        </div>
    </div>


</x-app-layout>
