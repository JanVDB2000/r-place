<div x-data="canvasComponent()" x-init="fetchDataAndRender()">
    <div class="min-h-[100vh] min-w-[100vh] grid bg-white border-4 border-black relative">
        <template x-for="cell in cells" :key="cell.id">
            <div class="w-full h-full border-black cursor-pointer"
                 x-bind:style="'grid-column: ' + (cell.x + 1) + '; grid-row: ' + (cell.y + 1) + '; background-color: ' + cell.color"
                 @click="openColorPanel(cell.id,cell.user.name)">
            </div>
        </template>
    </div>
    <!-- Color panel -->
    <div x-show="showPanel" class="absolute bottom-1/4 left-1/4 border-2 border-black bg-white p-4 shadow-md rounded-xl ">
        <h3 class="text-center pb-3" x-text="user"></h3>
        <div class="flex flex-wrap gap-1">
            <template x-for="color in availableColors" class="shadow-md rounded-xl">
                <button class="w-10 h-10 rounded-full mr-2 focus:outline-none border-2 border-black"
                        x-bind:style="'background-color: ' + color"
                        x-on:click="selectColor(color)"></button>

            </template>

            <button class="bg-gray-200 px-4 py-2 rounded-md text-gray-700 hover:bg-gray-300 focus:outline-none"
                    @click="hideColorPanel()">Close</button>
        </div>

    </div>

</div>
<script>
    function canvasComponent() {
        return {
            cells: [],
            showPanel: false,
            selectedColor: '#000000', // Default color is black
            selectedCellId: null,
            user: null,
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
            async fetchDataAndRender() {
                fetch('api/canvas/fetch')
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
            openColorPanel(cellId,name) {
                this.selectedCellId = cellId;
                this.user = name
                console.log(this.user)
                this.showPanel = true;
            },
            selectColor(color) {
                this.selectedColor = color;
                //console.log(color)
                //console.log( this.selectedCellId)
                // Update the cell color after selecting the color
                this.updateCellColor(color, this.selectedCellId)
                this.showPanel = false;
            },
            updateCellColor(selectedColor, cellId) {
                fetch('api/canvas/update', {
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
