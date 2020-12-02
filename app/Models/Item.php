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
        return $this->belongsTo(ItemTransaction::class);
    }
}
