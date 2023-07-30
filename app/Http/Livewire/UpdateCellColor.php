<?php

//// app/Http/Livewire/UpdateCellColor.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Canvas;

class UpdateCellColor extends Component
{
    public $canvas;
    public $selectedColor = '#ff0000'; // Default color is red
    public $showPanel = false;
    public $selectedCellId;

    public function mount(Canvas $canvas)
    {
        $this->canvas = $canvas;
    }

    public function showColorPanel($cellId)
    {
        $this->selectedCellId = $cellId;
        $this->showPanel = true;
    }

    public function selectColor($color)
    {
        $this->selectedColor = $color;
        $this->showPanel = false;

        // Update the cell color after selecting the color
        $this->updateCellColor($this->selectedCellId);
    }

    public function updateCellColor($cellId)
    {
        // Find the cell by its ID and update its color
        $cell = $this->canvas->pixels->firstWhere('id', $cellId);
        if ($cell) {
            $cell->update(['color' => $this->selectedColor]);
        }
    }

    public function render()
    {
        return view('livewire.update-cell-color');
    }
}

