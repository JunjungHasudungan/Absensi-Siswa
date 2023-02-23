<div class="mb-4">
    <label for="exampleFormControlInput2"
            class="block text-gray-700 text-sm font-bold mb-2">
            NISN:
    </label>
    <input  type="text"
            wire:model="nisn"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="exampleFormControlInput2"
            placeholder="Masukkan nisn Siswa..">
    @error('nisn') <span class="text-red-500">{{ $message }}</span>@enderror
</div>
