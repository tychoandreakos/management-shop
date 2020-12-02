<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    use UsesUuid;

    public function customer_transaction() {
        return $this->belongsTo(CustomerTransaction::class);
    }
}
