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

    protected $guarded = ['id'];

    /**
     * @return HasMany
     */
    public function customerTransaction(): HasMany
    {
        return $this->hasMany(CustomerTransaction::class);
    }

    public function customerLabelTransaction()
    {
        return $this->hasOne(CustomerLabel::class);
    }

    public function shipProviderTransaction()
    {
        return $this->hasMany(ShipProviderTransaction::class);
    }


    /**
     * @param $value
     * @return string
     */
    protected function getNameAttribute($value): string
    {
        return ucwords($value);
    }

    /**
     * @param $value
     */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * @param $value
     */
    protected function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    protected function setNumTelpAttribute($value)
    {
        $transform_value = explode(" ", $value);
        if (isset($transform_value[1])) {
            $this->attributes['num_telp'] = $transform_value[1];
        }
    }


    /**
     * @param $value
     * @return string
     */
    protected function getNumTelpAttribute($value): string
    {
        return "(+62) ${value}";
    }

}
