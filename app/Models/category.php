<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name', 'description' ,'parent_id'];
    use HasFactory;
    public function mobiles()
    {
        return $this->hasMany(Mobile::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // A category can belong to a parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
