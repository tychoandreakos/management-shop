<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipProvider extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function shipProviderTransaction()
    {
        return $this->hasMany(ShipProviderTransaction::class);
    }

    public function getNameAttribute($value)
		{
				$strResult;
        if (strlen($value) < 4) {
            $strResult = strtoupper($value);
        } else {
            $strResult = ucwords($value);
        }
        return $strResult;
    }

    public function setNameAttribute($value)
    {
        $this->attributes["name"] = strtolower($value);
    }
}
