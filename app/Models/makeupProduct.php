<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class makeupProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function makeup()
    {
        return $this->belongsTo(Makeup::class)->withTrashed();
    }

    public function makeupSubCategory()
    {
        return $this->belongsTo(MakeupSubCategory::class)->withTrashed();
    }

    protected $casts = [
        'images' => 'array'
    ];
}
