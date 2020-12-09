<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipProviderTransaction extends Model
{
    use HasFactory;
    use UsesUUID;

    protected $guarded = ['id'];

    public function shipProvider()
    {
        return $this->belongsTo(ShipProvider::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::cllass);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
