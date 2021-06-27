<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = "subcategories";

    protected $fillable = ['category_id','subcategory_fa','subcategory_en','status'];

    public function GetParent()
    {
        return $this->hasOne(Category::class, 'id','category_id');
    }
}
