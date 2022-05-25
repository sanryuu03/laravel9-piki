<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderPiki extends Model
{
    use HasFactory;

    protected $fillable = ['picture_path'];
}
