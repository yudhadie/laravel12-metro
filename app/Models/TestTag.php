<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestTag extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'test_tag';

    public function data()
    {
        return $this->belongsToMany(TestData::class, 'test_data_tag');
    }
}
