<?php

namespace App\Models;

use App\Models\PosAnggaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NamaKegiatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =['id'];

    public function posAnggaran()
    {
        return $this->belongsTo(PosAnggaran::class, 'pos_anggarans_id');
    }
}
