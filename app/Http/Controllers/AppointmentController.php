<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\AppointmentService;
use Exception;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Client\RequestException;
use phpDocumentor\Reflection\Types\Boolean;

class AppointmentController extends Controller
{

    private AppointmentService $service;

    public function __construct()
    {
        $this->service = new AppointmentService();
    }

    public function index()
    {
        try {

            return view("appointments.index", ["appointments" => $this->service->findAgentAppointments()]);
        } catch (Exception $e) {
            return view("appointments.index", ["appointments" => [], "errors" => new MessageBag(["", "Serviço indisponivel"])]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        if ($user) {
            return view('appointments.create', ['months' => Appointment::MONTHS, "hours" => Appointment::HOURS, "properties" => Property::all()]);
        } else {
            return abort(403, "Lamentamos mas não tem permissão para aceder a esta Página.");
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
        try {
            $input = $request->all();
            $this->service->save(new Appointment($input));
            return redirect()->route('properties.index')->with("message", "Pedido de agendamento criado com Sucesso.");
        } catch (RequestException $e) {
            return redirect()->route('properties.index')->withErrors(new MessageBag($e->response->json("errors")));
        } catch (Exception $e) {
            return redirect()->route('appointments.index')->withErrors(new MessageBag(["Erro:" => "Erro ao tentar agendar Visita", "Informação" => "Todos os Campos devem de ser preenchidos"]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        try {
            return view("appointments.show", ["appointments" => $this->service->findAgentAppointments()]);
        } catch (Exception $e) {
            return view("appointments.show", ["appointments" => [], "errors" => new MessageBag(["", "Serviço indisponivel"])]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        return view("appointments.edit", ["appointment" => $this->service->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment, string $id)
    {
        try {
            $input = $request->all();
            $input['isAccepted'] = true;
            dd($input);
            $this->service->find($id)->update($appointment($input));

            return redirect()->route('properties.index')->with("message", "Pedido de agendamento criado com Sucesso.");
        } catch (RequestException $e) {
            return redirect()->route('properties.index')->withErrors(new MessageBag($e->response->json("errors")));
        } catch (Exception $e) {
            return redirect()->route('appointments.index')->withErrors(new MessageBag(["Erro:" => "Erro ao tentar agendar Visita", "Informação" => "Todos os Campos devem de ser preenchidos"]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
