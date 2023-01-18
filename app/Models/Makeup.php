<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Makeup extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function makeupSubCategories()
    {
        return $this->hasMany(MakeupSubCategory::class);
    }
    public function makeupProducts()
    {
        return $this->hasMany(makeupProduct::class);
    }
}
