<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPiki extends Model
{
    use HasFactory;
    protected $fillable = ['picture_path','link_program'];
}
