<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white text-zinc-900 dark:bg-zinc-950 dark:text-zinc-100">
        <main class="mx-auto max-w-3xl px-6 py-12">
            <a
                href="{{ route('posts.index') }}"
                class="text-sm text-zinc-500 hover:text-zinc-900 dark:hover:text-white"
            >
                Back to posts
            </a>

            <article class="mt-8">
                <h1 class="text-4xl font-semibold">
                    {{ $post->title }}
                </h1>

                <p class="mt-3 text-sm text-zinc-500">
                    Published {{ $post->published_at->format('M d, Y') }}
                </p>

                @if ($post->description)
                    <p class="mt-6 text-lg text-zinc-600 dark:text-zinc-400">
                        {{ $post->description }}
                    </p>
                @endif

                <div class="mt-8 whitespace-pre-line leading-7">
                    {{ $post->content }}
                </div>
            </article>
        </main>
    </body>
</html>