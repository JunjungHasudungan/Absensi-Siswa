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
            <div class="bg-white px-4 pt-5 pb-2 sm:p-6 sm:pb-4 border">
                    {{-- student name--}}
                    @forelse ($students as $index => $student)
                    <ul class="max-w-md border rounded-lg border-gray-400 justify-center item-center  w-full space-y-2 mb-2 text-gray-500 list-none list-inside dark:text-gray-400">
                        <li class="px-2 py-2 item-center w-full mb-1">
                            <div class="w-full text-center justify-center mb-2 flex flex-inline" x-data="{open: false}">
                                <input  type="text"
                                        id="disabled-input"
                                        aria-label="disabled input"
                                        name="student_id"
                                        wire:model="student_id"
                                        class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Disabled input" disabled>
                                {{-- <label for="" class="px-2 py-2 text-center font-semibold">
                                    {{ $student->name }}
                                </label> --}}
                            </div>
                            <div class="border border-gray-900 rounded-lg space-x-1 flex flex-inline mb-4 px-2 py-2">
                                @foreach ($attendances as $index =>  $attendance)
                                    <div class=" w-full flex items-center px-2 border border-gray-200 rounded dark:border-gray-700">
                                        <button wire:click="openAttendance">
                                        <input id="bordered-radio-1" type="radio" value="{{$index}}" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="bordered-radio-1" class="w-full py-4 ml-2 text-sm font-bold text-gray-900">
                                                {{ $attendance }}
                                            </label>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <div class="w-full">
                                <button wire:click="storeAttendance()"
                                        class="w-full bg-green-600 hover:bg-green-300 rounded-lg px-2 py-2 text-base border border-gray-900 text-white leading-6 font-medium">
                                    <label for="" class="text-gray-300">
                                        Simpan
                                    </label>
                                </button>
                            </div>
                        </li>
                    </ul>
                    @empty

                    @endforelse
                    {{-- end input code classroom --}}



            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click.prevent="#"
                        type="button"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Simpan
                </button>
              </span>
              <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                <button wire:click="closeModalCreate()"
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
