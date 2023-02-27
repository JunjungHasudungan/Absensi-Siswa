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
                                <th scope="col" class="px-4 px-3 text-sm font-bold text-gray-900">
                                    Nama Kelas
                                </th>
                                <th scope="col" class="px-4 px-3 text-sm font-bold text-gray-900">
                                    Hari
                                </th>

                                <th scope="col" class="px-4 px-3">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classroomSubject as $index => $classroom)
                                <tr class="bg-white w-full">
                                    <td class="px-4 py-4">
                                        <select name="classroomSubject[{{$index}}][classroom_id]"
                                                wire:model="classroomSubject.{{$index}}.classroom_id"
                                                id="classroomSubject"
                                                class="border border-gray-300 text-gray-900 text-sm rounded-lg ring-blue-500 border-blue-500 block
                                                w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 font-semibold
                                                ">
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
                                    <td class="px-4 py-4">

                                        <select
                                        id="teacher_id"
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                        w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
                                        dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @forelse (\App\Helpers\Weekday::WEEK_DAYS as $key => $value)
                                            <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                                    value="{{ $value }}">
                                                    {{ $key }}
                                            </option>
                                        @empty
                                            <option class="font-normal bg-yellow-400 hover:font-bold capitalize">
                                                Data Guru Belum Tersedia..
                                            </option>
                                        @endforelse
                                    </select>

                                    </td>
                                    <td class="item-right">
                                        <button href="#" wire:click.prevent="removeClassroom({{$index}})"
                                                    class=" w-full inline-flex items-center mr-4 text-sm font-bold m-auto px-8
                                                    text-center text-yellow-900">
                                           <span class="text-center">
                                               Hapus
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
