<div>
<div class="canvas">
        @foreach ($jsonData as $cell)
            <div class="cell"
                 style="grid-column: {{ $cell->x + 1 }}; grid-row: {{ $cell->y + 1 }}; background-color: {{ $cell->color }};"
                 wire:click="showColorPanel({{ $cell->id }})">
            </div>
        @endforeach
    </div>
@if ($showPanel)
        <div class="color-panel card row">
            <h3 class="text-center">Select a color</h3>
            <div class="color-options d-flex">
                <div class="color-option rounded m-2" style="background-color: #ff0000" wire:click="selectColor('#ff0000')"></div>
                <div class="color-option rounded m-2" style="background-color: #00ff00" wire:click="selectColor('#00ff00')"></div>
                <div class="color-option rounded m-2" style="background-color: #0000ff" wire:click="selectColor('#0000ff')"></div>
                <div class="color-option rounded m-2" style="background-color: #ffff00" wire:click="selectColor('#ffff00')"></div>
                <div class="color-option rounded m-2" style="background-color: #ff00ff" wire:click="selectColor('#ff00ff')"></div>
                <div class="color-option rounded m-2" style="background-color: #ffa500" wire:click="selectColor('#ffa500')"></div>
                <div class="color-option rounded m-2" style="background-color: #800080" wire:click="selectColor('#800080')"></div>
                <div class="color-option rounded m-2" style="background-color: #a52a2a" wire:click="selectColor('#a52a2a')"></div>
                <div class="color-option rounded m-2" style="background-color: #ffc0cb" wire:click="selectColor('#ffc0cb')"></div>
                <div class="color-option rounded m-2" style="background-color: #b8860b" wire:click="selectColor('#b8860b')"></div>
            </div>
        </div>
    @endif
</div>



