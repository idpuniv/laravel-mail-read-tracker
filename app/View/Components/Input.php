<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $type;
    public $icon;
    public $label;
    public $required;
    public $autofocus;
    public $value;
    public $placeholder;

    public function __construct($name, $type, $icon, $label, $value="", $autofocus = false, $required = false, $placeholder="")
    {
        $this->name = $name;
        $this->type = $type;
        $this->icon = $icon;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
        $this->autofocus = $autofocus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input');
    }
}
