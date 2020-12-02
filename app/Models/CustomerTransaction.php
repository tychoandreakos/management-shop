<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTransaction extends Model
{
    use HasFactory;
    use UsesUUID;

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }
}
