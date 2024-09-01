<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    // Content.php (Model Anda)
    protected $casts = [
        'tgl' => 'datetime', // atau 'date'
    ];

    protected $fillable = ['img1', 'img2', 'img3', 'img4', 'title1', 'title2', 'place', 'tgl'];
}
