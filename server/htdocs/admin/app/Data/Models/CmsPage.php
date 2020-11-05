<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'images', 'created_by', 'updated_by'];

}
