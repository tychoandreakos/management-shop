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

    public function itemTransaction() {
        return $this->hasMany(ItemTransaction::class);
    }

    public function itemImage() {
        return $this->hasMany(ItemImage::class);
    }

    public function customerTransaction() {
        return $this->hasMany(CustomerTransaction::class);
    }

    public function shipProviderTransaction() {
        return $this->hasMany(ShipProviderTransaction::class);
    }
}
