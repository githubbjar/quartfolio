<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    public function scopeType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'slug',
        'type',
        'year',
        'quarter',
        'description',
        'is_featured',
        'hero_path',
        'thumb_path',
        'external_url',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function getQuarterLabelAttribute(): string
    {
        return match ($this->quarter) {
            1 => 'Spring',
            2 => 'Summer',
            3 => 'Fall',
            4 => 'Winter',
            default => '',
        };
    }

    public function getHeroUrlAttribute(): ?string
    {
        if ($this->hero_path) {
            return Storage::url($this->hero_path);
        }

        // Temporary fallback during migration
        return asset("images/covers/{$this->slug}.webp");
    }

    public function getThumbUrlAttribute(): ?string
    {
        if ($this->thumb_path) {
            return Storage::url($this->thumb_path);
        }

        // Optional fallback (or null)
        return asset("images/covers/{$this->slug}.webp");
    }

    protected static function booted()
    {
        static::creating(function ($project) {

            if (empty($project->slug)) {

                $baseSlug = Str::slug($project->title);
                $slug = $baseSlug;
                $count = 1;

                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }

                $project->slug = $slug;
            }
        });
    }

}
