<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\Validator as OfferDataValidator;

class Offer extends Model
{
    use HasFactory;

    public static function validateDataInput(array $input): OfferDataValidator
    {
        $rules = [
            'offer' => 'required',
        ];

        return Validator::make($input, $rules);
    }
    public function properties()
    {
        $this->belongsTo(Property::class);
    }

    public function users()
    {

        $this->hasMany(User::class);
    }
}
