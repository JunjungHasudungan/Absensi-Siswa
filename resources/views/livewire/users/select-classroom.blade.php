<div class="mb-6">
    <label for="classroom_id" class="block mb-2 text-sm font-bold text-gray-900">
        Kelas:
    </label>
    <select wire:model="classroom_id"
            id="classroom_id"
            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
            w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold
            dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">-- Pilih Kelas --</option>
            @forelse ($classrooms as $classroom)
            <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize"
                    value="{{ $classroom->id }}">
                    {{ $classroom->name }}
            </option>
        @empty
            <option class="font-normal bg-yellow-400 hover:font-bold capitalize">
                Data Kelas Tersedia..
            </option>
        @endforelse
    </select>
        @error('classroom_id')
                <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
</div>
