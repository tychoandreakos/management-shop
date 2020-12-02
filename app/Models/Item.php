<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    use UsesUUID;

    public function item_transaction() {
        return $this->hasMany(ItemTransaction::class);
    }

    public function item_image() {
        return $this->hasMany(ItemImage::class);
    }

    public function customer_transaction() {
        return $this->hasMany(CustomerTransaction::class);
    }
}
