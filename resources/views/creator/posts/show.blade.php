<x-layouts::app :title="$post->title">
    <div class="max-w-3xl">
        <a href="{{ route('creator.posts.index') }}" class="text-sm text-zinc-500 hover:text-zinc-900 dark:hover:text-white">
            Back to my posts
        </a>

        <article class="mt-8">
            <h1 class="text-3xl font-semibold">{{ $post->title }}</h1>

            <p class="mt-2 text-sm text-zinc-500">
                {{ ucfirst($post->status) }}
            </p>

            @if ($post->description)
                <p class="mt-6 text-lg text-zinc-600 dark:text-zinc-400">{{ $post->description }}</p>
            @endif

            <div class="mt-8 whitespace-pre-line leading-7">
                {{ $post->content }}
            </div>
        </article>
    </div>
</x-layouts::app>
