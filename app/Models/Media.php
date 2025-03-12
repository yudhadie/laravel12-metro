<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
     protected $fillable = ['mediable_id', 'mediable_type', 'path', 'type'];
     protected $table = 'media';

    public function mediable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return asset($this->path);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($media) {
            if ($media->path && Storage::exists($media->path)) {
                Storage::delete($media->path);
            }
        });
    }
}
