<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\View\Component;

class Slider extends Component
{
    public function render(): View
    {
        return ViewFacade::make('components.slider'); // <-- use your actual view name
    }
}
