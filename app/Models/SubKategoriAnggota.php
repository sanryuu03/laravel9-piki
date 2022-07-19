<?php

namespace App\Models;

use App\Models\KategoriAnggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKategoriAnggota extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =['id'];

    public function kategoriAnggota()
    {
        return $this->belongsTo(KategoriAnggota::class);
    }
}
