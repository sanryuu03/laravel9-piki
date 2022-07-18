<?php

namespace App\Models;

use App\Models\NamaKegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PosAnggaran extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =['id'];

    public function namaKegiatan()
    {
        return $this->hasMany(NamaKegiatan::class);
    }
}
