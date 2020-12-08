<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLabel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customerTransaction() {
        return $this->hasMany(CustomerTransaction::class);
    }
}
