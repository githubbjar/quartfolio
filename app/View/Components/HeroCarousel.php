<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\View\Component;

class HeroCarousel extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View
    {
        return ViewFacade::make('components.hero-carousel');
    }
}
