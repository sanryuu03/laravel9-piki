<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnggotaPiki extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function userPiki()
    {
        return $this->belongsTo(User::class);
    }
}
