<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestData extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'test_data';

    public function tag()
    {
        return $this->belongsToMany(TestTag::class, 'test_data_tag');
    }

    public function getPhotoAttribute()
    {
        if ($this->img == null) {
            $photo = asset('assets/media/no-image.jpg');
        } else {
            $photo = $this->img;
        }
        return $photo;
    }
}
