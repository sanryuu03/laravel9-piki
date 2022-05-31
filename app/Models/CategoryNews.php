<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function newsPiki()
    {
        return $this->hasMany(NewsPiki::class);
    }
}
