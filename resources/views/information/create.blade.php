<x-layouts::app :title="__('Create Information')">
    <div class="max-w-xl mx-auto">
        <form method="POST" action="{{ route('information.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block mb-2 font-medium">Title</label>
                <input
                    id="title"
                    name="title"
                    type="text"
                    value="{{ old('title') }}"
                    class="w-full border rounded px-3 py-2"
                    required
                >
                @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block mb-2 font-medium">Description</label>
                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    class="w-full border rounded px-3 py-2"
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Save Information
            </button>
        </form>
    </div>
</x-layouts::app>