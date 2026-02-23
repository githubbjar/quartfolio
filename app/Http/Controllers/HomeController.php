<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        return view('quartfolio', [

            'covers' => Project::type('cover')
                ->featured()
                ->latest()
                ->take(3)
                ->get(),

            'coverCount' => Project::type('cover')->count(),

            'layouts' => Project::where('type', 'layout')
                ->where('is_featured', true)
                ->latest()
                ->take(2)
                ->get(),

            'layoutCount' => Project::where('type', 'layout')->count(),

            'promotions' => Project::where('type', 'promotion')
                ->where('is_featured', true)
                ->latest()
                ->take(3)
                ->get(),

            'promotionCount' => Project::where('type', 'promotion')->count(),

            'websites' => Project::where('type', 'website')
                ->where('is_featured', true)
                ->latest()
                ->get(),

            'eblasts' => Project::where('type', 'eblast')
                ->where('is_featured', true)
                ->latest()
                ->take(3)
                ->get(),

            'eblastCount' => Project::where('type', 'eblast')->count(),

        ]);
    }
}
