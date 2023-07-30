
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>r/place</title>
    @livewireStyles
</head>
<body>
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f0f0f0;
    }
    .canvas {
        /* Adjust these values to change the canvas size */
        min-height: 100vh;
        min-width: 100vh;
        display: grid;
        background-color: #fff;
        border: 1px solid #ccc;
        position: relative;
    }

    .cell {
        width: 100%;
        height: 100%;
        background-color: #ccc;
        cursor: pointer;
    }

    .cell:hover {
        border: #cccccc;
    }

    .color-options {
        margin-top: 10px;
    }

    .color-panel {
        position: absolute;
        top: 0;
        left: 0;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        padding: 10px;
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .color-option {
        width: 30px;
        height: 30px;
        cursor: pointer;
    }

    /* Styling for the select dropdown */
    #color-select {
        padding: 5px;
    }
</style>
    <livewire:update-cell-color :canvas="$canvas" />
@livewireScripts
</body>
</html>
