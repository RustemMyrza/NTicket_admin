<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'organizations';

    protected $fillable = [
        'name',
        'transport_type'
    ];

    public function getRoutes()
    {
        return $this->hasMany(Route::class, 'organizer', 'id');
    }
}
