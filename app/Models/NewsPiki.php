<?php

namespace App\Models;

use App\Models\CategoryNews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsPiki extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function categoryNews()
    {
        return $this->belongsTo(CategoryNews::class);
    }

}
