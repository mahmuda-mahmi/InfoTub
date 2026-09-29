<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Contracts\View\View;

class PublicInformationController extends Controller
{
    public function index(): View
    {
        $posts = Information::published()
            ->latest('published_at')
            ->paginate(10);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
    public function show(Information $information): View
    {
        abort_unless(
            $information->status === 'published'
            && $information->published_at !== null
            && $information->published_at->isPast(),
            404,
        );

        return view('posts.show', [
            'post' => $information,
        ]);
    }
}
