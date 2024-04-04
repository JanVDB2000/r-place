<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pixel extends Model
{
    use HasFactory;

    protected $fillable = [
        'x', 'y', 'color',
    ];

    public function canvas()
    {
        return $this->belongsTo(Canvas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
