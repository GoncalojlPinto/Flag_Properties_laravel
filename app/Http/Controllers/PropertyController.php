<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PropertyController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('properties.index', ["properties" => Property::all(), 'users' => User::all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $user = auth()->user();
        if($user->hasRole('admin|agent')){
        return view('properties.create', ["typologies" => Property::TYPOLOGIES]);
    }else{
        return abort(403, "Lamentamos mas não tem permissão para inserir um Imóvel");
    }
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

        $input['photo'] = $this->ValidatorForPhotoStorage($request);
        $input['agent_id'] = auth()->user()->id;

        $validator = Property::validateDataInput($input);

        if ($validator->fails()) {
            return redirect()->route('properties.create')->withErrors($validator->errors());
        }

        $property = $this->fillProperty(new Property(), $input);

        try {
            $property->save();
        } catch (QueryException $error) {
            return redirect()->route('properties.index')->withErrors(new MessageBag(["error", "Erro ao tentar gravar o Imóvel"]));
        }

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
        return view('properties.show', ['property' => $property]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        if (auth()->user()->id !== $property->agent_id) {

            return abort(403, "Lamentamos mas não tem permissão para editar este Imóvel");
        } else {
            return view('properties.edit', ['property' => $property, 'typologies' => Property::TYPOLOGIES]);
        }
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
        $input = $request->all();

        $input['photo'] = $this->ValidatorForPhotoStorage($request);
        $input['agent_id'] = auth()->user()->id;
        $validator = Property::validateDataInput($input);

        if ($validator->fails()) {
            return redirect()->route('properties.edit', $property->id)->withErrors($validator->errors());
        }

        $property = $this->fillProperty($property, $input);

        try {
            $property->save();
        } catch (QueryException $error) {
            return redirect()->route('properties.index')->withErrors(new MessageBag(["error", $error->getMessage()]));
        }

        return redirect(route('properties.index'))->with("message", "Imóvel atualizado com sucesso.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        if (auth()->user()->id !== $property->agent_id) {

            return abort(403, "Lamentamos mas não tem permissão para apagar este Imóvel");
        } else {
            Property::destroy($property->id);
            return redirect()->route('properties.index')->with("message", " Imóvel removido com sucesso.");
        }
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
        $property->agent_id = $input['agent_id'];

        if ($input['photo']) {
            $property->photo = $input['photo'];
        }

        return $property;
    }

    private function ValidatorForPhotoStorage(Request $request)
    {

        $ValidExtension = ['jpg', 'jpeg', 'png'];

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $extension = $file->extension();

            if (in_array($extension, $ValidExtension)) {
                $photoFile = uniqid() . '.' . $extension;
                return $file->storeAs('/', $photoFile, 'public_images');
            }
            return false;
        }
        return false;
    }

    public function favoritePost(Property $property)
    {
        $user = Auth::user();
        $favorite = new Favorite;
        $favorite->user_id = $user->id;
        $favorite->property_id = $property->id;
        $favorite->save();
        return response()->json(['Sucess' => 'True']);
    }

    public function unFavoritePost(Property $property)
    {
        $user = Auth::user();
        $favorite = $user->favorites()->where('property_id', $property->id)->get()->get(0)->delete();
    }
}
