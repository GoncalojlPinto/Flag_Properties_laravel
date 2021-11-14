<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\Property;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class AppointmentService
{

    private const TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOiI2MTg5M2QyMjlkZjhkNTBkYmQ1MGZhYWEiLCJpYXQiOjE2MzY0MDI0NDF9.FhOX0rytc3h8zaOvombAxZjbTvjh3w-syGZC-QKt8Ig';
    private const ENDPOINT = 'http://127.0.0.1:5005/api/appointments/';

    public function all(): array
    {

        $response = Http::withToken(self::TOKEN)->get(self::ENDPOINT);

        $appointments = [];
        if ($response->successful()) {
            foreach ($response->json() as $attributes) {
                array_push($appointments, new Appointment($attributes));
            }
        }
        return $appointments;
    }

    public function findAgentAppointments()
    {

        $response = Http::withToken(self::TOKEN)->get(self::ENDPOINT)->json();
        $response = collect($response);

        $agentAppointments = $response->filter(function ($agent) {
            return $agent['agent_id'] === auth()->user()->id;
        });
        return $agentAppointments;
    }

    public function save(Appointment $appointment): void
    {
        $response = Http::withToken(self::TOKEN)->acceptJson()->post(self::ENDPOINT, $appointment->toArray());

        if ($response->failed()) {
            $response->throw();
        }
    }

    public function update(Appointment $appointment): void
    {
        $response = Http::withToken(self::TOKEN)->acceptJson()->put(self::ENDPOINT, $appointment->toArray());

        if ($response->failed()) {
            $response->throw();
        }
    }

    public function find(string $id): ?Appointment
    {
        $response = Http::withToken(self::TOKEN)->acceptJson()->get(self::ENDPOINT . $id);
        return $response->successful() ? new Appointment($response->json()) : null;
    }
}
