<?php

namespace App\View\Components\Admin\Form;

use Illuminate\View\Component;

class Switches extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $label,
        public string $data,
    ){}


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form.switches');
    }
}

