<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'consultation_requests';

    protected $fillable = [
        'name',
        'phone'
    ];
}
