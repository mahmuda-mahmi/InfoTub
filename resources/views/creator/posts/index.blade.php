<x-layouts::app :title="__('My Posts')">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold">My Posts</h1>
            <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Manage the posts you have created.</p>
        </div>

        <a href="{{ route('creator.posts.create') }}" class="rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200">
            Create Post
        </a>
    </div>

    <div class="mt-8 space-y-4">
        @forelse ($posts as $post)
            <article class="rounded-lg border border-zinc-200 p-5 dark:border-zinc-700">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-semibold">{{ $post->title }}</h2>
                        <p class="mt-1 text-sm text-zinc-500">{{ ucfirst($post->status) }}</p>
                    </div>

                    <a href="{{ route('creator.posts.edit', $post) }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
                        Edit
                    </a>
                </div>

                @if ($post->description)
                    <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400">{{ $post->description }}</p>
                @endif
            </article>
        @empty
            <p class="text-zinc-600 dark:text-zinc-400">You have not created any posts yet.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</x-layouts::app>
