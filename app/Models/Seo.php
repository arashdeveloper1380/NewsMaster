<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $table = "seos";

    protected $fillable = [
        'meta_author',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'google_analytics',
        'google_verification',
        'alexa_analytics'
    ];
}
