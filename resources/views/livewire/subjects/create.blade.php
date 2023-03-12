<div>
    {{-- <form action="{{ route('admin.subjects.store') }}" method="POST">
        @csrf --}}

    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>

          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="">
                {{-- code subject --}}
                    <div class="mb-4">
                        <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">
                                Kode Mata Pelajaran :
                        </label>
                        <input type="text"
                                name="code_subject"
                                class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1"
                                placeholder="Kode Mata Pelajaran.."
                                wire:model="code_subject">
                        @error('code_subject') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{-- end code subject --}}
                    {{-- input subject name --}}
                    <div class="mb-4">
                        <label for="exampleFormControlInput2"
                                class="block text-gray-700 text-sm font-bold mb-2">
                                Nama Mata Pelajaran :
                        </label>
                        <input  type="text"
                                wire:model="name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput2"
                                placeholder="Nama Mata Pelajaran..">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{-- end input subject name --}}

                    {{-- select teacher --}}
                    <div class="mb-6">
                        <label for="user_id" class="block mb-2 text-sm font-bold text-gray-900">
                            Nama Guru
                        </label>
                        <select wire:model="user_id"
                                id="user_id"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
                                dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- Pilih nama Guru --</option>
                                @forelse ($teachers as $teacher)
                                <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                        value="{{ $teacher->id }}">
                                        {{ $teacher->name }}
                                </option>
                            @empty
                                <option class="font-normal bg-yellow-400 hover:font-bold capitalize">
                                    Data Guru Belum Tersedia..
                                </option>
                            @endforelse
                        </select>
                            @error('user_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    {{-- end select teacher --}}

                    {{-- multi select subject classroom --}}
                    <div class="mb-2 w-full inline space-x-4 space-x-reverse">
                    <table class="w-full text-sm rounded text-left text-gray-400">
                        <thead class="text-xs text-gray-700 camelcase bg-gray-50 text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 px-3 text-sm font-bold text-gray-900">
                                   Jadwal Kelas
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subject_classrooms as $index => $subject_classroom)
                                <tr class="bg-white w-full">
                                    <td class="px-1 py-4">
                                        <select name="subject_classrooms[{{$index}}][classroom_id]"
                                                wire:model="subject_classrooms.{{$index}}.classroom_id"
                                                id="classroomSubject"
                                                class="border border-gray-300 text-gray-900 text-sm rounded-lg ring-blue-500 border-blue-500 block
                                                w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 font-semibold
                                                ">
                                                <option value="">-- Kelas --</option>
                                                @forelse ($allClassroom as $classroom)
                                                    <option class="font-normal dark:border-gray-600  hover:font-bold gap-y-px border-gray-300 rounded-lg capitalize"
                                                            value="{{ $classroom->id }}">
                                                            {{ $classroom->name }}
                                                    </option>
                                                @empty
                                                    <option class="bg-yellow-400 font-bold capitalize">
                                                        Data Kelas Belum Tersedia..
                                                    </option>
                                                @endforelse
                                        </select>
                                    </td>
                                    {{-- day --}}
                                    <td class="px-1 py-4">
                                        <select
                                        id="weekday"
                                        name="subject_classrooms[{{$index}}]['day']"
                                        wire:model="subject_classrooms.{{ $index }}.day"
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                        w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
                                        dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option value=""> Hari </option>
                                        @forelse (\App\Helpers\Weekday::WEEK_DAYS as $key => $day)
                                            <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                                    value="{{ $day }}">
                                                    {{ $day }}
                                            </option>
                                        @empty
                                            <option class="font-normal bg-yellow-400 hover:font-bold capitalize">
                                                Data Guru Belum Tersedia..
                                            </option>
                                        @endforelse
                                    </select>
                                    </td>
                                    {{-- end day--}}

                                    {{-- start time --}}
                                    <td class="px-2 py-4">
                                        <select
                                        id="weekday"
                                        name="subject_classrooms[{{$index}}]['start_time']"
                                        wire:model="subject_classrooms.{{ $index }}.start_time"
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                        w-full px-5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
                                        dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option value="" class="px-2"> Start  </option>
                                        @forelse ($start as $start_time)
                                            <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                                    value="{{ $start_time }}">
                                                    {{ $start_time }}
                                            </option>
                                        @empty
                                            <option class="font-normal bg-yellow-400 hover:font-bold capitalize">
                                                Data Guru Belum Tersedia..
                                            </option>
                                        @endforelse
                                    </select>
                                    </td>
                                    {{-- end start time--}}

                                    {{-- start time --}}
                                    <td class="px-1 py-4">
                                        <select
                                        id="weekday"
                                        name="subject_classrooms[{{$index}}]['end_time']"
                                        wire:model="subject_classrooms.{{ $index }}.end_time"
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                        w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
                                        dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option value=""> End </option>
                                        @forelse ($end_times as $end_time)
                                            <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                                    value="{{ $end_time }}">
                                                    {{ $end_time }}
                                            </option>
                                        @empty
                                            <option class="font-normal bg-yellow-400 hover:font-bold capitalize">
                                                Data Guru Belum Tersedia..
                                            </option>
                                        @endforelse
                                    </select>
                                    </td>
                                    {{-- end start time--}}

                                    <td class="item-right">
                                        <button href="#" wire:click.prevent="removeClassroom({{$index}})"
                                                    class=" w-full inline-flex items-center justify-items-end text-sm font-bold m-auto px-8
                                                    text-center text-yellow-900">
                                           <span class="text-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                              </svg>


                                           </span>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <button wire:click.prevent="addClassroom"
                                class="w-auto text-white bg-blue-700 hover:bg-blue-800
                                m-4
                                focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
                                rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600
                                hover:bg-blue-700 focus:ring-blue-800">
                                + Kelas
                        </button>
                    </div>
                    </div>
                    {{-- end multi select subject classroom --}}

              </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <div>
                    <button wire:click.prevent="storeSubject()"
                    type="button"
                    class="inline-flex justify-center w-full rounded-md border border-transparent
                        px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm
                        hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green
                        transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Simpan
            </button>

                    {{-- <input type="submit"  value="Simpan"
                    class="inline-flex justify-center w-full rounded-md border border-transparent
                        px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm
                        hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green
                        transition ease-in-out duration-150 sm:text-sm sm:leading-5"> --}}
                </div>
              </span>
              <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                <button wire:click="closeCreateModal()"
                        type="button"
                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2
                        bg-gray-600 text-base  text-white leading-6 font-medium text-whiteshadow-sm
                        hover:bg-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue
                        transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Cancel
                </button>
              </span>
              </form>
            </div>

          </div>
        </div>
      </div>

    {{-- </form> --}}
</div>
