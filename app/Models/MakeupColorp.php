<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MakeupColorp extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function makeupProducts()
    {
        return $this->belongsTo(makeupProduct::class, 'makeup_product_id')->withTrashed();
    }

    protected $casts = [
        'images' => 'array'
    ];
}
