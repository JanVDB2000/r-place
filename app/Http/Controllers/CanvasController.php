<?php

namespace App\Http\Controllers;

use App\Models\Canvas;
use App\Models\Pixel;
use Illuminate\Http\Request;

class CanvasController extends Controller
{

    public function __construct()
    {
        $this->canvas = Canvas::first();
    }


    public function index()
    {
        $canvas = $this->canvas;
        return view('canvas.index', compact('canvas'));
    }

    public function fetchCanvas(): \Illuminate\Http\JsonResponse
    {
        $allPixels = Pixel::with('user')->get();
        return response()->json($allPixels);
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        if ( $request->get('cellId') && $request->get('selectedColor')){
            // Find the cell by its ID and update its color
            $cell = $this->canvas->pixels->firstWhere('id', $request->get('cellId'));
            if ($cell) {
                $cell->update(['color' => $request->get('selectedColor')]);
            }
            // Return updated data
            return response()->json($this->canvas->pixels);
        }
        return response()->json($this->canvas->pixels);
    }
}
