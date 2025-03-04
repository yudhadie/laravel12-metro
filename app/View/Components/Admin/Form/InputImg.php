<?php

namespace App\View\Components\Admin\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputImg extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $class,
        public string $label,
        public string $name,
        public string $value,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form.input-img');
    }
}
