<div>

    <div class="W-full px-1 py-1 gap-2 flex">
        <p class="text-gray-500">
            Mapel:  {{ $subject->name ?? ''}} | Kelas: {{ $subject->classroom->name ?? ''}}
        </p>
    </div>
    <div class="container mx-auto mt-5 mb-5">
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
                    </tr>
                </thead>
                <tbody>
                    <form  action="/teacher/presences" method="post" >
                        @csrf
                        @forelse ($students as $index => $student)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <input type="hidden" name="presences[{{ $index }}][teacher_id]" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="presences[ {{ $index }} ] ['student_id']" value="{{ $student->id }}">
                                <input type="hidden" name="presences[ {{ $index }} ] [ 'classroom_id' ]" value=" {{ $student->classroom->id }} ">
                                <input type="hidden" name="presences[ {{ $index }} ] [ 'subject_id' ]" value="{{ $subject->id }}">
                                <td class="px-6 py-4" >{{ $student->name ?? '' }} </td>
                                <td class="px-6 py-4">
                                    <select class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="2"> H - Hadir</option>
                                        @foreach ($attendances as $attendance)
                                        <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize" value="{{ $attendance->id }}"> {{ $attendance->code }} - {{ $attendance->description }} </option>
                                        @endforeach
                                    </select>
                                    @empty
                                    <div class="bg-yellow-500 text-white p-3 rounded shadow-sm mb-2">
                                        Data Siswa Belum tersedia..
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </form>
                </tbody>
            </table>
        </div>
        @if (count($students) > 0)
            <div class="w-full mt-2 justify-right">
                <button class="px-2 py-2 rounded-lg text-white border-gray-900 bg-green-900 hover:bg-green-500"
                        type="submit"
                        value="Submit">
                    Simpan
                </button>
            </div>
        @endif
        </div>
    </div>

</div>
