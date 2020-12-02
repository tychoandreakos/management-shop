<?php

namespace App\Models;


use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    use UsesUUID;

    /**
     * @return HasMany
     * @var mixed
     */

    public function customerTransaction() {
        return $this->hasMany(CustomerTransaction::class);
    }
}
