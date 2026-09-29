<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Published Posts | InfoTub</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-white text-zinc-900 dark:bg-zinc-950 dark:text-zinc-100">
        <main class="mx-auto max-w-5xl px-6 py-12">
            <header class="mb-10">
                <a href="{{ url('/') }}" class="text-sm text-zinc-500 hover:text-zinc-900 dark:hover:text-white">
                    InfoTub
                </a>

                <h1 class="mt-4 text-4xl font-semibold">
                    Published Posts
                </h1>

                <p class="mt-2 text-zinc-600 dark:text-zinc-400">
                    Read the latest information from our creators.
                </p>
            </header>

            @if ($posts->isEmpty())
                <p class="text-zinc-600 dark:text-zinc-400">
                    No published posts are available yet.
                </p>
            @else
                <div class="space-y-6">
                    @foreach ($posts as $post)
                        <article class="border-b border-zinc-200 pb-6 dark:border-zinc-800">
                            <h2 class="text-2xl font-semibold">
                                {{ $post->title }}
                            </h2>

                            @if ($post->description)
                                <p class="mt-2 text-zinc-600 dark:text-zinc-400">
                                    {{ $post->description }}
                                </p>
                            @endif

                            <p class="mt-3 text-sm text-zinc-500">
                                Published {{ $post->published_at->format('M d, Y') }}
                            </p>
                        </article>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            @endif
        </main>
    </body>
</html>