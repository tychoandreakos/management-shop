<?php

namespace App\Models;

use App\Http\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLabelTransaction extends Model
{
    use HasFactory;
    use UsesUUID;

    protected $guarded = ['id'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function customerLabel() {
        return $this->belongsTo(CustomerLabel::class);
    }
}
