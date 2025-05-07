<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'capacity',
        'status'
    ];

    /**
     * Obtener el estado de la mesa en formato legible
     */
    public function getStatusTextAttribute()
    {
        $statusMap = [
            'available' => 'Disponible',
            'occupied' => 'Ocupada',
            'reserved' => 'Reservada',
            'maintenance' => 'En mantenimiento'
        ];

        return $statusMap[$this->status] ?? 'Desconocido';
    }

    /**
     * Obtener el color de la clase según el estado
     */
    public function getStatusColorAttribute()
    {
        $colorMap = [
            'available' => 'green',
            'occupied' => 'red',
            'reserved' => 'blue',
            'maintenance' => 'gray'
        ];

        return $colorMap[$this->status] ?? 'gray';
    }

    /**
     * Relación con órdenes
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Relación con reservas
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Verificar si la mesa está disponible en una fecha y hora específica
     */
    public function isAvailableAt($dateTime, $duration = 60)
    {
        if ($this->status === 'maintenance') {
            return false;
        }

        $startTime = new \DateTime($dateTime);
        $endTime = (clone $startTime)->modify("+{$duration} minutes");

        return !$this->reservations()
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($startTime, $endTime) {
                $query->where(function ($q) use ($startTime, $endTime) {
                    // Verifica si hay alguna reserva que se solape con el periodo solicitado
                    $q->where('reservation_time', '<', $endTime->format('Y-m-d H:i:s'))
                      ->where(function ($inner) use ($startTime) {
                          $inner->whereRaw('DATE_ADD(reservation_time, INTERVAL duration MINUTE) > ?', [
                              $startTime->format('Y-m-d H:i:s')
                          ]);
                      });
                });
            })
            ->exists();
    }
}
