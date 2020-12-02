<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    use UsesUUID;
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
