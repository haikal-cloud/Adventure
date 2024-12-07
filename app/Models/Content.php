<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    var $fillable = [
        'name',
        'slug',
        'thumbnail',
        'address',
        'main_scene_id'
    ];

    public function main_scene()
    {
        return $this->belongsTo(Scene::class, 'main_scene_id', 'id');
    }
}
