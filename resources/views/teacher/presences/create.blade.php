<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="W-full px-1 py-1 gap-2 flex">
                        @foreach ($subjects as $item)
                            <p class="text-gray-500">
                                Mapel:  {{ $item->name }} |
                            </p>
                            @foreach ($item->classroomSubject as $classroom)
                                <p class="text-gray-500">
                                    Kelas: {{ $classroom->name }}
                                </p>

                            @endforeach
                        @endforeach
                    </div>
                    <div class="container mx-auto mt-5 mb-10">
                        <div class="bg-gray-500 p-5 rounded shadow-sm">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Siswa
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Keterangan Kehadiran
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="">
                                        @csrf
                                        @forelse ($subjects as $subject)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="px-6 py-4">
                                                    {{ $loop->iteration }}
                                                </td>
                                                    @forelse ($subject->subjectStudent as $student)
                                                        <td class="px-6 py-4">
                                                            {{ $student->name }}
                                                        </td>
                                                    @empty
                                                        <p class="bg-yellow-900">
                                                            data Siswa Belum tersedia..
                                                        </p>
                                                    @endforelse

                                                <td class="px-6 py-4">
                                                    Laptop
                                                </td>
                                            <td class="px-6 py-4 text-right">
                                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>

                                        </tr>
                                        @endforelse
                                </tbody>
                            </form>
                            </table>
                        </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
