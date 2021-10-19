<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as PropertyDataValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model {

    use HasFactory;

    //public static array $typologies = ['T0' => 'T0', 'T1' => 'T1', 'T2' => 'T2', 'T3' => 'T3', 'T4' => 'T4', 'T5' => 'T5', 'T6' => 'T6'];

    public static function validateDataInput (array $input): PropertyDataValidator
    {

        $rules = [
            'description' => 'required',
            'location' => 'required',
            'floor' => 'required|max:3',
            'type' => 'required',
            'bedrooms' => 'required|numeric|min:0',
            'bathrooms' => 'required|min:1',
            'price' => 'required|numeric'
        ];


        return Validator::make($input, $rules);
    }



}
