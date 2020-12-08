<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipProvider extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function shipProviderTransaction()
    {
        return $this->hasMany(ShipProviderTransaction::class);
    }
}
