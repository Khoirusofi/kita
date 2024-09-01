<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $fillable = ['img1', 'img2', 'img3', 'img4', 'img5', 'title1', 'title2', 'title3'];
}
