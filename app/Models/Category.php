<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','parent_id'];
    public function ParentCategory(){
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function SubCategory(){
        return $this->hasMany(Category::class, 'parent_id')->with('details');
    }
    public function details(){
        return $this->hasOne(Details::class);
    }
}
