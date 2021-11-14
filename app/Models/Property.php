<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as PropertyDataValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class Property extends Model
{

    use HasFactory;

    const TYPOLOGIES = ['T0', 'T1', 'T2', 'T3', 'T4',  'T5', 'T6'];

    public static function validateDataInput(array $input): PropertyDataValidator
    {

        $rules = [
            'description' => 'required',
            'location' => 'required',
            'floor' => 'required|max:3',
            'type' => 'required',
            'bedrooms' => 'required|numeric|min:1',
            'bathrooms' => 'required|min:1',
            'price' => 'required|numeric',

        ];

        return Validator::make($input, $rules);
    }


    public function users()
    {

        return $this->belongsTo(User::class);
    }

    public function favorited()
    {
        return Favorite::where('user_id', Auth::id())->where('property_id', $this->id)->first();
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
