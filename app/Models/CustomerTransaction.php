<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTransaction extends Model
{
    use HasFactory;
    use UsesUUID;

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class)->with(['shipProviderTransaction.shipProvider']);
    }

    public function getSendingStatusAttribute($value): string
    {
        return ucfirst($value);
    }
}
