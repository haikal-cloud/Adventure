<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    use HasFactory;

    var $fillable = [
        'title',
        'hfov',
        'pitch',
        'yaw',
        'img',
        'content_id'
    ];

    public function hotspot()
    {
        return $this->hasMany(Hotspot::class, 'id');
    }
}
