<?php

namespace App\Http\Livewire;

use App\Models\Canvas;
use Livewire\Component;

class UpdateCellColor extends Component
{
    public $canvas;
    public $selectedColor = 'white';
    public $showPanel = false;
    public $selectedCellId;

    public function mount(Canvas $canvas)
    {
        $this->canvas = $canvas;
    }

    public function render()
    {
        return view('livewire.update-cell-color', [
            'canvas' => $this->canvas,
        ]);
    }

    public function showColorPanel($cellId)
    {
        $this->selectedCellId = $cellId;
        $this->showPanel = true;
    }

    public function selectColor($color,$selectedCellId)
    {
        $this->selectedColor = $color;
        $this->showPanel = false;
        // Update the cell color after selecting the color
        $this->updateCellColor($selectedCellId);
    }

    public function updateCellColor($cellId)
    {
        // Find the cell by its ID and update its color
        $cell = $this->canvas->pixels->firstWhere('id', $cellId);
        if ($cell) {
            $cell->update(['color' => $this->selectedColor]);
        }
    }

    protected $listeners = [
        'openColorPanel' => 'showColorPanel',
        'selectColor' => 'selectColor',
    ];
}

