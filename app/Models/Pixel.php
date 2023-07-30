<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pixel extends Model
{
    use HasFactory;

    protected $fillable = [
        'x', 'y', 'color', // Add any additional fillable fields here
    ];

    public function canvas()
    {
        return $this->belongsTo(Canvas::class);
    }
}
