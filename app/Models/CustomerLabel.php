<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLabel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customerLabelTransaction() {
        return $this->hasOne(CustomerLabelTransaction::class);
    }
}
