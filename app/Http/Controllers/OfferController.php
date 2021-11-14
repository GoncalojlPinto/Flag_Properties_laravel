<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('offers.index', ['offers' => Offer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('admin|agent|user')) {
            return view('offers.create', ['properties' => Property::all()]);
        } else {
            return abort(403, "Necessita de fazer Login para fazer uma proposta");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Offer $offer)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        $validator = Offer::validateDataInput($input);

        if ($validator->fails()) {
            return redirect()->route('properties.index')->withErrors($validator->errors());
        }

        $offer = $this->fillOffer(new Offer(), $input);
        try {
            $offer->save();
        } catch (QueryException $error) {
            return redirect()->route('properties.index')->withErrors(new MessageBag(["error", "Erro ao tentar fazer proposta"]));
        }

        return redirect(route('properties.index'))->with("message", "Pedido de Agendamento enviado com Sucesso.");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer, Property $property)
    {
        return view('offers.edit', ['property' => $property]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Offer::validateDataInput($input);

        if ($validator->fails()) {
            return redirect()->route('properties.index')->withErrors($validator->errors());
        }

        $offer = $this->fillOffer(new Offer(), $input);
        try {
            $offer->save();
        } catch (QueryException $error) {
            return redirect()->route('properties.index')->withErrors(new MessageBag(["error", "Erro ao tentar fazer proposta"]));
        }

        return redirect(route('properties.index'))->with("message", "Pedido de Agendamento enviado com Sucesso.");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function fillOffer(Offer $offer, array $input): Offer
    {
        $offer->offer = $input['offer'];
        $offer->user_id = $input['user_id'];
        $offer->property_id = $input['property_id'];
        $offer->estado = 'pendente';

        return $offer;
    }

    public function allOffers()
    {

        $offers = auth()->user()->offers()->get();
        return view('offers.myoffers')->with([
            'offers' => $offers
        ]);
    }
}
