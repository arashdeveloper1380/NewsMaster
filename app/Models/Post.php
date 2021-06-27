<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "post";

    protected $fillable = [
        'category_id','subcategory_id',
        'district_id','subdistrict_id',
        'user_id','title_en','title_fa',
        'image','details_en','details_fa',
        'tags_en','tags_fa','headline',
        'first_section','first_section_thumbnail',
        'bigthumbnail','post_date','post_month'
    ];

    public function GetParentCategory()
    {
        return $this->hasOne(Category::class, 'id','category_id');
    }

    public function GetChildCategory()
    {
        return $this->hasOne(SubCategory::class, 'id','subcategory_id');
    }

    public function GetParentDistrict()
    {
        return $this->hasOne(District::class, 'id','district_id');
    }

    public function GetChildDistrict()
    {
        return $this->hasOne(SubDistrict::class, 'id','subdistrict_id');
    }
}
