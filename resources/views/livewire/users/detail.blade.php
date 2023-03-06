<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 w-full h-full">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>

          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    {{-- table --}}
                <div class="max-w-6xl mx-auto mb-2">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 w-full dark:text-gray-400">                                                {{-- user name --}}
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Nama
                                            </th>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                    {{ $user->name }}
                                                </td>
                                            </tr>
                                            {{-- end user name --}}
                                            {{-- role name --}}
                                            <tr class="border-b">
                                                <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                    Jabatan
                                                </th>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                    {{ $user->role->name}}
                                                </td>
                                            </tr>
                                            {{-- end role name --}}
                                            {{-- email user --}}
                                            <tr class="border-b">
                                                <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                    Email
                                                </th>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                    {{ $user->email}}
                                                </td>
                                            </tr>
                                            {{-- end email user --}}
                                            {{-- address user --}}
                                            <tr class="border-b">
                                                <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                    Alamat
                                                </th>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                    {{ $user->address}}
                                                </td>
                                            </tr>
                                            {{-- end address user --}}
                                            {{-- if role teacher --}}
                                            @if ($user->role_id === 2)
                                            {{-- administration subject name --}}
                                            <tr class="border-b">
                                                <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                    Mata Pelajaran
                                                </th>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400">
                                                    @forelse ($subject_teacher as $subject)
                                                        <ul class="list-disc list-inside max-w-md space-y-1 text-gray-900">
                                                            <li> {{$subject->name}} </li>
                                                        </ul>
                                                        @empty
                                                            <p class="text-yellow-900 font-bold">
                                                                {{ __('Mata Pelajaran Belum ada..') }}
                                                            </p>
                                                    @endforelse
                                                </td>
                                            </tr>
                                                {{-- end administration subject name --}}
                                                {{-- home teacher classroom --}}
                                                <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                        Wali Kelas
                                                    </th>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                            @if ($home_teacher_classroom)
                                                                <p class="text-blue-900 font-bold">
                                                                    {{ $home_teacher_classroom->name}}
                                                                </p>
                                                                @else
                                                                <p class="text-yellow-900 font-bold">
                                                                    {{ __('Bukan Wali Kelas..') }}
                                                                </p>
                                                            @endif
                                                        </td>
                                                </tr>
                                                {{-- end home teacher classroom --}}
                                                @endif
                                                {{-- end if role teacher --}}

                                                {{-- if role student --}}
                                                @if ($user->role_id == 3)
                                                {{-- classroom name --}}
                                                <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                        Kelas
                                                    </th>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                        {{ $classroom}}
                                                    </td>
                                                </tr>
                                                {{-- end classroom name --}}

                                                {{-- NISN student --}}
                                                <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                        NISN
                                                    </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                            {{ $nisn}}

                                                            @empty($nisn)
                                                                <p class="font-bold text-yellow-900">
                                                                    {{ __('NISN Belun ada') }}
                                                                </p>
                                                            @endempty
                                                        </td>
                                                </tr>
                                                {{-- end NISN student --}}

                                                 {{-- home teacher student --}}
                                                 <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                        Wali Kelas
                                                    </th>
                                                    @forelse ($teacher as $home_teacher)
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                            {{ $home_teacher->name}}
                                                            @empty
                                                                <p class="text-yellow-900 font-bold">
                                                                    {{ __('Belum ada wali kelas.') }}
                                                                </p>
                                                    @endforelse
                                                        </td>
                                                </tr>
                                                {{-- end home teacher student --}}

                                                {{-- subject name for student --}}
                                                <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                       Mata Pelajaran
                                                    </th>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400">
                                                            @forelse ($subject_student as $subject)
                                                                <ul class="list-disc list-inside text-gray-900">
                                                                    <li>
                                                                        {{ $subject->name ?? 'Belum ada'}}
                                                                    </li>
                                                                </ul>
                                                            @empty
                                                            <p class="text-yellow-900 font-bold">
                                                                {{ __('Mata Pelajaran Belum ada.') }}
                                                            </p>
                                                            @endforelse
                                                        </td>
                                                </tr>
                                                {{-- end subject name for student --}}

                                                @endif
                                                {{-- end if role student --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end table --}}
                    </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-2 sm:px-6 sm:flex sm:flex-row-reverse">
                      <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalDetail()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                          Kembali
                        </button>
                      </span>
            </div>
          </div>
        </div>
      </div>
</div>





