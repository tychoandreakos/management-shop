<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTransaction extends Model
{
    use UsesUUID;
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function spesificationItem() {
        return $this->belongsTo(SpesificationItem::class);
    }

}
