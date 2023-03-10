<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center max-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="">
                <div class="grid md:grid-cols-2 md:gap-6">
                    {{-- input name user --}}
                    <div class="mb-4">
                        <label for="exampleFormControlInput2"
                            class="block text-gray-700 text-sm font-bold mb-2">
                            Nama:
                        </label>
                        <input  type="text"
                        wire:model="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput2"
                        placeholder="Masukkan Nama User..">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{-- end input name user --}}
                    {{-- input email user --}}
                    <div class="mb-4">
                        <label for="exampleFormControlInput2"
                            class="block text-gray-700 text-sm font-bold mb-2">
                            Email:
                        </label>
                        <input  type="email"
                            wire:model="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2"
                            placeholder="Masukkan Email User.."
                            required autocomplete="current-password">
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{-- end input email user --}}
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    {{-- input password user --}}
                    <div class="mb-4">
                        <label for="exampleFormControlInput2"
                                class="block text-gray-700 text-sm font-bold mb-2">
                                Password:
                        </label>
                        <input  type="text"
                                wire:model="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput2"
                                placeholder="Masukkan Password User..">
                        @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{-- end input password user --}}

                        {{-- address --}}
                    <div class="mb-4">
                        <label for="exampleFormControlInput2"
                            class="block text-gray-700 text-sm font-bold mb-2">
                            Alamat:
                        </label>
                        <input  type="text"
                            wire:model="address"
                            class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput2"
                            placeholder="Alamat User..">
                            @error('address') <span class="text-red-500">{{ $message }}</span>@enderror
                        {{-- end addres --}}
                    </div>
                </div>
                     {{-- select role --}}
                     <div class="mb-6">
                        <label for="role_id" class="block mb-2 text-sm font-bold text-gray-900">
                            Pilih Jabatan
                        </label>
                        <select wire:model="role_id"
                                id="role_id"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- Pilih Jabatan --</option>
                            @forelse ($roles as $role)
                                <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                value="{{ $role->id }}"> {{ $role->name }} </option>
                            @empty
                                <option class="font-normal bg-yellow-400 hover:font-bold capitalize">Data Guru Belum Tersedia..</option>
                            @endforelse
                        </select>
                        @error('role_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    {{-- end select role --}}

                    {{-- grid --}}
                <div class="grid md:grid-cols-2 md:gap-6">
                    {{-- select classroom --}}
                    @if ($role_id == 3)
                    <div class="mb-6" x-data="{ show: false }">
                        <label for="classroom_id" class="block mb-2 text-sm font-bold text-gray-900">
                            Kelas:
                        </label>
                        <select name="classroom_id"
                                wire:model="classroom_id"
                                id="classroom_id"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
                                dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- Pilih Kelas --</option>
                                @forelse ($classrooms as $classroom)
                                <button class="bg-blue-900" type="button" x-on:click="show = !show">
                                    <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                                        value="{{ $classroom->id }}">
                                            {{ $classroom->name }}
                                    </option>
                                </button>
                            @empty
                                <option class="font-normal bg-yellow-400 hover:font-bold capitalize">
                                    Data Kelas Tersedia..
                                </option>
                            @endforelse
                        </select>
                        @error('classroom_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    {{-- multi select subject classroom --}}

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
                        {{-- end addres --}}
                    </div>
                </div>
                    {{-- end multi select subject classroom --}}
                    @endif
                    {{-- end select classroom --}}
              </div>
              {{-- end grid --}}

              {{-- select option --}}
              @if ($role_id == 3)
                <div class="mb-4">
                    <label for="exampleFormControlInput2"
                            class="block text-gray-700 text-sm font-bold mb-2">
                            Mata Pelajaran:
                    </label>
                    <div class="w-full border border-slate-900 rounded-lg" x-show="show" x-on:click.away="show = false">
                        <ul class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                            @forelse ($classrooms as $subjects)
                               @foreach ($subjects->subjectClassroom as $index => $subject)
                               <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                   <div class="flex items-center pl-3">
                                       <input   id="vue-checkbox"
                                                type="checkbox"
                                                wire:model="studentSubject.{{$index}}.subject_id"
                                                name="studentSubject.[{{$index}}][subject_id]"
                                                value="{{ $subject->id }}"
                                                value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                       <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">
                                           {{ $subject->name }} kode-subject: [ {{ $subject->code_subject }} ]
                                       </label>
                                   </div>
                               </li>
                               @endforeach
                            @empty
                                <p class="text-yellow-900">
                                    Data Pelajaran Belum tersedia...
                                </p>
                            @endforelse
                        </ul>
                    </div>
                </div>
              @endif
              {{-- end select --}}
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button
                        wire:click.prevent="storeUser()"
                        type="button"
                        class="inline-flex justify-center w-full rounded-md border border-transparent
                        px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm
                        hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green
                        transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Simpan
                </button>
              </span>
              <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                <button wire:click="closeModalCreate()"
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
