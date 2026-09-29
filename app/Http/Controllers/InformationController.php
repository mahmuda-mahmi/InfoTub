<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function create(): View
    {
        return view('information.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        /** @var User $user */
        $user = $request->user();

        $user->information()->create($validated);

        return redirect()->route('dashboard')->with('success', 'Information created successfully.');
    }
}
