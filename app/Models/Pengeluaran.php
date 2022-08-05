<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SubMenuNavbarKeuangan;

class Pengeluaran extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =['id'];

    public function subMenuNavbarKeuangan()
    {
        return $this->belongsTo(SubMenuNavbarKeuangan::class, 'pos_anggaran');
    }
}
