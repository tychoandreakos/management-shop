<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    use UsesUUID;

    protected $guarded = ['id'];

    public function itemTransaction()
    {
        return $this->hasOne(ItemTransaction::class);
    }

    public function itemImage()
    {
        return $this->hasOne(ItemImage::class);
    }

    public function customerTransaction()
    {
        return $this->hasMany(CustomerTransaction::class);
    }

    public function shipProviderTransaction()
    {
        return $this->hasMany(ShipProviderTransaction::class);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
