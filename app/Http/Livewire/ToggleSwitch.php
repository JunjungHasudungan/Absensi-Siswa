<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ToggleSwitch extends Component
{
    public Model $model;

    public string $field;
    public bool $isCheck;
    public bool $saved = false;


    public function mount()
    {
        $this->isCheck = (bool) $this->model->getAttribute($this->field);
    }

    public function render()
    {
        return view('livewire.toggle-switch');
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();

        $this->emit('saved');
    }
}
