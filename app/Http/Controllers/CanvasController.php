<?php

namespace App\Http\Controllers;

use App\Models\Canvas;
use App\Models\Pixel;
use Illuminate\Http\Request;

class CanvasController extends Controller
{
    public function index()
    {
        $canvas = Canvas::query()->first();
        return view('canvas.index', compact('canvas'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'x' => 'required|integer|min:0|max:19', // Adjust the max value to match the number of columns - 1
            'y' => 'required|integer|min:0|max:19', // Adjust the max value to match the number of rows - 1
            'color' => 'required|string|max:1',
        ]);

        $cell = Pixel::updateOrCreate(
            ['x' => $request->x, 'y' => $request->y],
            ['color' => $request->color]
        );

        return response()->json(['message' => 'Cell updated successfully']);
    }
}
