<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MakeupSubCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function makeup()
    {
        return $this->belongsTo(Makeup::class)->withTrashed();
    }
    public function makeupProduct()
    {
        return $this->hasMany(makeupProduct::class)->withTrashed();
    }
}
