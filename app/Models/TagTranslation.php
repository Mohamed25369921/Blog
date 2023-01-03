<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'tag_id', 'locale', 'title'];
}