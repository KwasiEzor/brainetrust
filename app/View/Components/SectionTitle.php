<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionTitle extends Component
{
    public string $title;
    public string $letter;
    public  $attributes;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$letter,$attributes=[])
    {
        //
        $this->title = $title;
        $this->letter = $letter;
        $this->attributes = $attributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.section-title');
    }
}
