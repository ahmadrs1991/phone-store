<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    protected $fillable = ['name', 'description', 'price', 'brand', 'image'];

    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
