<?php

namespace App\Models;

use App\Models\CategoryNews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class NewsPiki extends Model
{
    use HasFactory, Sluggable;
    protected $guarded =['id'];

    public function categoryNews()
    {
        return $this->belongsTo(CategoryNews::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul_berita'
            ]
        ];
    }

}
