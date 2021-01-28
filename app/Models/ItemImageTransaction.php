<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemImageTransaction extends Model
{
    use HasFactory;

    use UsesUUID;

    protected $guarded = ['id'];

    public function itemImage()
    {
        return $this->belongsTo(ItemImage::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
