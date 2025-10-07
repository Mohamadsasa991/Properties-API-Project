<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'broker_id','address' ,'listing_type','city', 'zip_code','description', 'build_year'
    ];

    public function characteristic():HasOne {
        return $this->hasOne(PropertyCharacteristics::class);
    }
}
