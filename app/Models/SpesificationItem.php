<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesificationItem extends Model
{
    use HasFactory;


    public function item_transaction()
    {
        return $this->belongsTo(ItemTransaction::class);
    }
}
