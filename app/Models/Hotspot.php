<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotspot extends Model
{
    use HasFactory;

    var $fillable = [
        'pitch',
        'yaw',
        'type',
        'scene_id',
        'text',
        'change_scene_id'
    ];

    public function scene()
    {
        return $this->belongsTo(Scene::class, 'scene_id', 'id');
    }
}
