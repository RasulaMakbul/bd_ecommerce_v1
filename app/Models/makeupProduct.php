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
        return $this->belongsTo(Makeup::class, 'makeup_id')->withTrashed();
    }

    public function makeupSubCategory()
    {
        return $this->belongsTo(MakeupSubCategory::class, 'makeupSubCategory_id')->withTrashed();
    }

    public function makeupColorP()
    {
        return $this->hasMany(MakeupColorp::class)->withTrashed();
    }

    protected $casts = [
        'images' => 'array'
    ];
}
