<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'tickets';

    protected $fillable = [
        'seat',
        'passenger',
        'route'
    ];

    public function getUser()
    {
        return $this->hasOne(Route::class, 'id', 'route');
    }
}
