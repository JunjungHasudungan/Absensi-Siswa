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

                    {{-- input title --}}
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Materi Pelajaran :</label>
                        <input type="text"
                        name="title"
                        wire:model="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title"
                        placeholder="Masukkan Judul Materi..">

                        @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{-- end input title --}}

                     {{-- select Mata Pelajaran --}}
                     <div class="mb-6">
                        <label for="user_id" class="block mb-2 text-sm font-bold text-gray-900">
                          Mata Pelajaran
                        </label>
                        <select wire:model="subject_id"
                                name="subject_id"
                                id="subject_id"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">-- Pilih Mata Pelajaran --</option>
                                @forelse ($subjects as $key => $subject)
                                    <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize" value="{{ $subject->id }}"> {{ $subject->name }} </option>
                                @empty
                                    <option class="font-normal bg-yellow-400 hover:font-bold capitalize">Data Guru Belum Tersedia..</option>
                                @endforelse
                        </select>
                        @error('subject_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{-- end select Mata Pelajaran --}}

                    {{-- select classroom --}}
                    <div class="mb-6">
                        <label for="method_learning" class="block mb-2 text-sm font-bold text-gray-900">
                          Metode Pengajaran
                        </label>
                        <select wire:model="method_learning"
                                name="method_learning"
                                id="method_learning"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- Pilih Metode --</option>
                                @forelse (\App\Helpers\MethodLearning::METHOD_LEARING as $key => $method_learing)
                                <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize" value="{{ $method_learning }}"> {{ $key }} </option>
                                @empty
                                <option class="font-normal bg-yellow-400 hover:font-bold capitalize">Data Guru Belum Tersedia..</option>
                                @endforelse
                        </select>
                        @error('method_learning') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{-- end select classroom --}}

                    {{-- select method_learning --}}
                    {{-- <div class="mb-6">
                        <label for="user_id" class="block mb-2 text-sm font-bold text-gray-900">
                           Metode Pembelajaran
                        </label>
                        <select wire:model="method_learning"
                                id="user_id"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- Pilih Metode Pembelajaran --</option>
                            @forelse (\App\Helpers\MethodLearning::METHOD_LEARING as $key => $method_learing)
                                <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize" value="{{ $method_learning }}"> {{ $key }} </option>
                            @empty
                                <option class="font-normal bg-yellow-400 hover:font-bold capitalize">Data Guru Belum Tersedia..</option>
                            @endforelse
                        </select>
                        @error('user_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div> --}}
                    {{-- end select method_learning --}}

              </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click.prevent="storeAdministration()"
                        type="button"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Simpan
                </button>
              </span>
              <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                <button wire:click="isCloseModalCreate()"
                        type="button"
                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-600 text-base  text-white leading-6 font-medium text-whiteshadow-sm hover:bg-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Cancel
                </button>
              </span>
              </form>
            </div>

          </div>
        </div>
      </div>


</div>
