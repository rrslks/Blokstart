<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
