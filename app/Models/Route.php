<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'routes';

    protected $fillable = [
        'from_place',
        'to_place',
        'departure_time',
        'arrival_time',
        'price',
        'seats_number',
        'organizer',
    ];

    public function getTickets()
    {
        return $this->hasMany(Route::class, 'tickets', 'id');
    }
}
