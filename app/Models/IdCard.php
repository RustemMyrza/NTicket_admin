<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdCard extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'id_cards';

    protected $fillable = [
        'name',
        'surname',
        'middle_name',
        'birth_date',
        'iin',
        'number',
        'nationality'
    ];

    public function getClient ()
    {
        return $this->hasOne(Client::class, 'bank_card', 'id');
    }
}
