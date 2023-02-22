<div>

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
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
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
                        <label for="teacher_id" class="block mb-2 text-sm font-bold text-gray-900">
                            Nama Guru
                        </label>
                        <select wire:model="teacher_id"
                                id="teacher_id"
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
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                    </div>
                    {{-- end select teacher --}}

                    {{-- multi select subject classroom --}}
                    <div class="mb-6">
                        <label  for="teacher_id"
                                class="block mb-2 text-sm font-bold text-gray-900">
                                Pilih Nama Kelas
                        </label>
                        <div class="flex justify-center items-center w-full bg-gray-300 rounded-lg p-2">
                            <div class="inline-block justify-center">

                                <div class="flex items-center mr-4">
                                    @forelse ($classrooms as $classroom)
                                        <input  id="inline-checkbox"
                                        type="checkbox"
                                        value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500
                                        dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700
                                        dark:border-gray-600">
                                        <label  for="inline-checkbox"
                                                class="ml-2 text-sm font-bold text-gray-900 m-2">
                                                    {{ $classroom->name }}
                                        </label>
                                    @empty
                                        <div class="w-full border border-yellow-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                            w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
                                            dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <p class="w-full text-yellow-900 font-extrabold justify-center items-center">Kelas Belum Tersedia...</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end multi select subject classroom --}}

                    {{-- jadwal mata pelajaran --}}
                    <div class="mb-6">
                        <div class="grid md:grid-cols-3 md:gap-6">
                            {{-- Pilihan hari Pelajaran --}}
                            <div class="relative z-0 w-full mb-3 group">
                                <label for="teacher_id" class="block mb-2 text-sm font-bold text-gray-900">
                                    Hari
                                </label>
                                <select wire:model="teacher_id"
                                    id="teacher_id"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                    w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
                                    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" class="text-center">Pilih Hari</option>
                                    @forelse ($subject_weekday as $weekday)
                                        <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                                value="{{ $weekday->id }}">
                                                {{ $weekday->name }}
                                        </option>
                                    @empty
                                        <option class="font-normal bg-yellow-400 hover:font-bold capitalize">
                                            Data Guru Belum Tersedia..
                                        </option>
                                    @endforelse
                                </select>
                            </div>
                            {{-- end Pilihan  Hari Pelajaran--}}

                             {{-- Pilihan Start Time --}}
                             <div class="relative z-0 w-full mb-6 group">
                                <label for="teacher_id" class="block mb-2 text-sm font-bold text-gray-900">
                                    Waktu Mulai
                                </label>
                                <select wire:model="teacher_id"
                                    id="teacher_id"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                    w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
                                    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" class="text-center">Pilih Jam</option>
                                    @forelse ($subject_weekday as $weekday)
                                        <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                                value="{{ $weekday->id }}">
                                                {{ $weekday->name }}
                                        </option>
                                    @empty
                                        <option class="font-normal bg-yellow-400 hover:font-bold capitalize">
                                            Data Guru Belum Tersedia..
                                        </option>
                                    @endforelse
                                </select>
                            </div>
                            {{-- end Start Time  --}}

                            {{-- Pilihan Start Time --}}
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="teacher_id" class="block mb-2 text-sm font-bold text-gray-900">
                                    Waktu Mulai
                                </label>
                                <select wire:model="teacher_id"
                                    id="teacher_id"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                    w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
                                    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" class="text-center">Pilih Jam</option>
                                    @forelse ($subject_weekday as $weekday)
                                        <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                                value="{{ $weekday->id }}">
                                                {{ $weekday->name }}
                                        </option>
                                    @empty
                                        <option class="font-normal bg-yellow-400 hover:font-bold capitalize">
                                            Data Guru Belum Tersedia..
                                        </option>
                                    @endforelse
                                </select>
                            </div>
                            {{-- end Start Time  --}}
                          </div>
                    </div>
                    {{-- end jadwal mata pelajran --}}
              </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click.prevent="storeSubject()"
                        type="button"
                        class="inline-flex justify-center w-full rounded-md border border-transparent
                        px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm
                        hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green
                        transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Simpan
                </button>
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


</div>
