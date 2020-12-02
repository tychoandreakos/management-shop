<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    use HasFactory;
    use UsesUUID;

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function spesification_item()
    {
        return $this->hasOne(SpesificationItem::class);
    }


}
