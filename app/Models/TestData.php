<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TestData extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'test_data';

    public function tag()
    {
        return $this->belongsToMany(TestTag::class, 'test_data_tag');
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function cover()
    {
        return $this->morphOne(Media::class, 'mediable')->where('type', 'cover');
    }

    public function getCoverUrlAttribute()
    {
        if ($this->cover) {
            return asset($this->cover->path);
        }
        return asset('assets/media/no-image.jpg');
    }

    public function gallery()
    {
        return $this->morphMany(Media::class, 'mediable')->where('type', 'gallery');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($test) {
            foreach ($test->media as $media) {
                if ($media->path && Storage::exists($media->path)) {
                    Storage::delete($media->path);
                }
                $media->delete();
            }
        });
    }
}
