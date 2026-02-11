<?php

namespace App\Http\Controllers;

use App\Models\Layout;

class LayoutController extends Controller
{
    public function index()
    {
        $layouts = Layout::orderBy('created_at', 'desc')->paginate(3);

        return view('layouts.index', compact('layouts'));
    }
}
