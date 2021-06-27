<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    protected $table = "subdistrict";

    protected $fillable = [
        'district_id',
        'subdistrict_fa',
        'subdistrict_en',
        'status'
    ];

    public function GetParent()
    {
        return $this->hasOne(District::class, 'id','district_id');
    }
}
