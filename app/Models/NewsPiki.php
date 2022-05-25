<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPiki extends Model
{
    use HasFactory;
    protected $fillable = ['picture_path','keterangan_foto','isi_berita','link_berita'];
}
