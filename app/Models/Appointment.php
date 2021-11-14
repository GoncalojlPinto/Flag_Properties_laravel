<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    const MONTHS = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio',  'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    const HOURS = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'];
    const ESTADO = ['Confirmado', 'Rejeitado'];
    private ?string $id;
    private string $agent_id;
    private string $hour;
    private int $day;
    private string $month;
    private int $year;
    private ?bool $isAccepted;

    public function __construct(array $attributes)
    {

        $this->id = isset($attributes["_id"]) ? $attributes["_id"] : null;
        $this->agent_id = $attributes["agent_id"];
        $this->hour = $attributes["hour"];
        $this->day = $attributes["day"];
        $this->month = $attributes["month"];
        $this->year = $attributes["year"];
        $this->isAccepted = isset($attributes["isAccepted"]) ? $attributes["isAccepted"] : null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAgentId(): string
    {
        return $this->agent_id;
    }

    public function getHour(): string
    {
        return $this->hour;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getMonth(): string
    {
        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getAccepted(): ?bool
    {
        return $this->isAccepted;
    }

    public function toArray(): array
    {
        return [
            "agent_id" => $this->agent_id,
            "hour" => $this->hour,
            "day" => $this->day,
            "month" => $this->month,
            "year" => $this->year,
            "isAccepted" => $this->isAccepted,
            "id" => $this->id
        ];
    }
}
