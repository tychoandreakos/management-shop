<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesificationItem extends Model
{
    use HasFactory;


    public function itemTransaction()
    {
        return $this->hasOne(ItemTransaction::class);
    }

    public function categoryTransaction() {
        return $this->hasMany(CategoryTransaction::class);
    }
}
