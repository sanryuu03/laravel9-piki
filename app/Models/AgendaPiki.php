<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaPiki extends Model
{
    use HasFactory;
    protected $fillable = ['nama_agenda','picture_path','keterangan_agenda'];
}
