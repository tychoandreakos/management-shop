<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesificationItem extends Model
{
    use HasFactory;


    public function item_transaction()
    {
        return $this->hasOne(ItemTransaction::class);
    }

    public function category_transaction() {
        return $this->hasMany(CategoryTransaction::class);
    }
}
