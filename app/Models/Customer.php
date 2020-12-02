<?php

namespace App\Models;


use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    use UsesUUID;

    public function customer_transaction() {
        return $this->hasMany(CustomerTransaction::class);
    }
}
