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
                {{-- grid --}}
                <div class="grid md:grid-cols-2 md:gap-6">
                    {{-- user name --}}
                    <div class="mb-4">
                        <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">
                            Nama:
                        </label>
                        <input  type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1"
                                placeholder="Nama User"
                                wire:model="name">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{--  end user name --}}

                    {{--email --}}
                    <div class="mb-4">
                        <label for="email"
                                class="block text-gray-700 text-sm font-bold mb-2">Email :
                        </label>
                        <input  type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="email"
                                placeholder="Email.."
                                wire:model="email">
                        @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        {{-- end email --}}
                    </div>
                </div>
                {{-- end grid --}}

                {{-- grid --}}
                <div class="grid md:grid-cols-2 md:gap-6">
                    {{-- user name --}}
                    <div class="mb-4">
                        <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">
                            Password:
                        </label>
                        <input  type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1"
                                placeholder="Password Baru.."
                                wire:model="password">
                        @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{--  end user name --}}

                    {{--email --}}
                    <div class="mb-4">
                        <label for="address"
                                class="block text-gray-700 text-sm font-bold mb-2">
                                Alamat :
                        </label>
                        <input  type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="address"
                                placeholder="Alamat.."
                                wire:model="address">
                        @error('address') <span class="text-red-500">{{ $message }}</span>@enderror
                        {{-- end email --}}
                    </div>
                </div>
                {{-- end grid --}}

                     {{-- role --}}
                     <div class="mb-6">
                        <label for="role_id" class="block mb-2 text-sm font-bold text-gray-900">
                            Pilih Jabatan:
                        </label>
                        <select
                                wire:model="role_id"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- Pilih Jabatan --</option>
                                @forelse ($roles as $role)
                                <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                        value="{{ $role->id }}" > {{ $role->name }}
                                    </option>
                            @empty
                                <option class="bg-yellow-300 font-normal text-yellow-500 hover:font-bold capitalize">Data Jabatan Belum Tersedia..</option>
                            @endforelse
                        </select>
                        @error('role_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{-- end role --}}


                @if ($role_id == 3)
                {{-- grid --}}
                <div class="grid md:grid-cols-2 md:gap-6">
                    {{-- classroom --}}
                    <div class="mb-6">
                        <label for="classroom" class="block mb-2 text-sm font-bold text-gray-900">
                            Pilih Nama Kelas
                        </label>
                        <select
                            wire:model="classroom"
                           class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">-- Nama Kelas --</option>
                            @forelse ($classrooms as $classroom)
                                <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                    value=" {{ $classroom->id }} " > {{ $classroom->name }}
                                </option>
                            @empty
                                <option class="bg-yellow-300 font-normal text-yellow-500 hover:font-bold capitalize">Data Guru Belum Tersedia..</option>
                            @endforelse
                        </select>
                    </div>
                    {{-- end classroom --}}

                    <div class="mb-4">
                        <label for="exampleFormControlInput2"
                            class="block text-gray-700 text-sm font-bold mb-2">
                            NISN:
                        </label>
                        <input  type="text"
                            wire:model="nisn"
                            class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2"
                            placeholder="NISN Murid..">
                            @error('nisn') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{-- end addres --}}
                    </div>
                    {{-- end grid --}}

                    {{-- mata pelajaran --}}
                    <div class="mb-4">
                        <label for="exampleFormControlInput2"
                            class="block text-gray-700 text-sm font-bold mb-2">
                            Mata Pelajaran:
                        </label>
                        <div class="flex item-center mr-4 inline-block">
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    @forelse ($classroom_subject as $subject)
                                        <div class="flex items-center pl-3">
                                            <input  id="vue-checkbox-list"
                                                    type="checkbox"
                                                    value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label  for="vue-checkbox-list"
                                                    class="w-38 py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                {{ $subject->name }}
                                            </label>
                                        </div>
                                    @empty
                                    <option class="bg-yellow-300 font-normal text-yellow-500 hover:font-bold capitalize">
                                        Data Jabatan Belum Tersedia..
                                    </option>
                                    @endforelse
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- end mata pelajaran --}}
                    @endif
              </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click.prevent="updateUser({{$id_user}})"
                        type="button"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Update
                </button>
              </span>
              <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                <button wire:click="closeModalEdit()"
                        type="button"
                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Cancel
                </button>
              </span>
              </form>
            </div>

          </div>
        </div>
      </div>


</div>
