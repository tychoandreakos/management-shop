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

    /**
     * @param $value
     * @return string
     */
    protected function getNumTelpAttribute($value): string
    {
        return "(+62) ${value}";
    }

}
