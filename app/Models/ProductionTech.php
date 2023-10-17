<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionTech extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'parent_id', 'category_id', 'description'];
}
