<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    use HasFactory;
    use UsesUUID;

    protected $guarded = ['id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function spesificationItem()
    {
        return $this->belongsTo(SpesificationItem::class)->with('categoryTransaction.category');
    }


}
