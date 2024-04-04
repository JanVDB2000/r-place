<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>r/place</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            top: 50%;
            left: 38%;
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
    @livewireStyles
</head>
<body>

<x-canvas.canvas></x-canvas.canvas>

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
