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
            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama Kelas: </label>
                <input type="text" wire-model="name" id="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Masukkan nama kelas.." required>
            </div>
            <div class="mb-6">
                <label for="teacher_id" class="block mb-2 text-sm font-medium text-gray-900">Select Nama Guru</label>
                <select id="teacher_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @forelse ($teachers as $id =>  $teacher)
                        <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize" value="{{$id}}" {{  old('teacher_id') == $id ? 'selected' : ''}}> {{ $teacher }} </option>
                    @empty
                        <option class="font-normal hover:font-bold capitalize">Data Guru Belum Tersedia..</option>
                    @endforelse
                </select>
            </div>
          </div>
        </div>

        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="closeModalDetail()" type="button" class=" bg-gray-600 inline-flex justify-center w-full rounded-md border border-gray-600 px-4 py-2 text-base leading-6 font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Kembali
            </button>
          </span>
          </form>
        </div>

      </div>
    </div>
  </div>
