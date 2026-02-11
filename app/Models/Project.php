<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'slug',
        'type',
        'date',
        'description',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
