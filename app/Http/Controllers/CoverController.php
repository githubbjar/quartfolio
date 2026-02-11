<?php

namespace App\Http\Controllers;

use App\Models\Cover;

class CoverController extends Controller
{
    public function index()
    {
        $covers = Cover::orderBy('created_at', 'desc')->paginate(3);

        return view('covers.index', compact('covers'));
    }

    public function show(Cover $cover)
    {
        $next = Cover::where('id', '>', $cover->id)
            ->orderBy('id')
            ->first()
         ?? Cover::orderBy('id')->first();

        $prev = Cover::where('id', '<', $cover->id)
            ->orderByDesc('id')
            ->first()
        ?? Cover::orderByDesc('id')->first();

        return view('covers.show', ['cover' => $cover, 'next' => $next, 'prev' => $prev],
        );
    }
}
