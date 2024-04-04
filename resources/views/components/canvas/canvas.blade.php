<div x-data="canvasComponent()" x-init="fetchDataAndRender()">
    <div class="canvas">
        <template x-for="cell in cells" :key="cell.id">
            <div class="cell"
                 x-bind:style="'grid-column: ' + (cell.x + 1) + '; grid-row: ' + (cell.y + 1) + '; background-color: ' + cell.color"
                 @click="openColorPanel(cell.id)">
            </div>
        </template>
    </div>

    <!-- Color panel -->
    <div x-show="showPanel" class="color-panel bg-white p-4 shadow-md rounded-xl">
        <template x-for="color in availableColors" class="shadow-md rounded-xl">
            <button class="w-10 h-10 rounded-full mr-2 focus:outline-none"
                    x-bind:style="'background-color: ' + color"
                    x-on:click="selectColor(color)"></button>
        </template>
        <button class="bg-gray-200 px-4 py-2 rounded-md text-gray-700 hover:bg-gray-300 focus:outline-none"
                @click="hideColorPanel()">Close</button>
    </div>
</div>
<script>
    function canvasComponent() {
        return {
            cells: [],
            showPanel: false,
            selectedColor: '#000000', // Default color is black
            selectedCellId: null,
            availableColors: [
                'black',
                'grey',
                'white',
                'red',
                'orange',
                'yellow',
                'green',
                'lightblue',
                'blue',
                'purple',
                'pink',
                'brown',
                'gold',
                'silver'
            ],
            fetchDataAndRender() {
                fetch('/canvas/fetch')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        this.cells = data;
                    })
                    .catch(error => {
                        console.error('An error occurred:', error);
                    });
            },
            openColorPanel(cellId) {
                this.selectedCellId = cellId;
                this.showPanel = true;
            },
            selectColor(color) {
                this.selectedColor = color;
                console.log(color)
                console.log( this.selectedCellId)
                // Update the cell color after selecting the color
                this.updateCellColor(color, this.selectedCellId)
                this.showPanel = false;
            },
            updateCellColor(selectedColor, cellId) {
                fetch('/canvas/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token for Laravel
                    },
                    body: JSON.stringify({
                        cellId: cellId,
                        selectedColor: selectedColor
                    })
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then(data => {
                    // Update the Livewire component's data with the updated data from the server
                    this.cells = data;
                })
                    .catch(error => {
                        console.error('An error occurred:', error);
                    });
            },
            hideColorPanel() {
                this.showPanel = false;
            }
        }
    }
</script>
