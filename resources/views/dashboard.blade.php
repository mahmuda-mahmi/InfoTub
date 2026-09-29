<x-layouts::app :title="__('Dashboard')">
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('information.create') }}" class="text-white bg-linear-to-br from-purple-600 to-blue-500 hover:bg-linear-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-base text-sm px-4 py-2.5 text-center leading-5">
            Create New Information
        </a>
    </div>

    @php
        $information = auth()->user()->information()->latest()->get();
    @endphp

    <div class="mt-6 space-y-4">
        @if($information->isEmpty())
            <p class="text-gray-500">No information yet.</p>
        @else
            @foreach($information as $item)
                <div class="border rounded p-4">
                    <h3 class="font-semibold text-lg">{{ $item->title }}</h3>
                    <p class="mt-2 text-gray-700">{{ $item->description }}</p>
                    <p class="mt-2 text-sm text-gray-500">
                        {{ $item->created_at->format('d-m-Y') }}
                    </p>
                </div>
            @endforeach
        @endif
    </div>
</x-layouts::app>