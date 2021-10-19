<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('properties.index', ["properties" => Property::all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // ["typologies" => Property::$typologies]
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // $validator = Property::validateDataInput($input);
        $property = $this->fillProperty(new Property(), $input);
        $property->save();

        return redirect(route('properties.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('properties.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }

    private function fillProperty(Property $property, array $input): Property
    {
        $property->description = $input['description'];
        $property->floor = $input['floor'];
        $property->type = $input['type'];
        $property->bedrooms = $input['bedrooms'];
        $property->bathrooms = $input['bathrooms'];
        $property->location = $input['location'];
        $property->price = $input['price'];

        // if($input['photo']){
        //     $property->photo = $input['photo'];

        return $property;
        }

    }
