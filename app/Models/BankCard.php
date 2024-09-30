<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCard extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'bank_cards';

    protected $fillable = [
        'name',
        'number',
        'cvv'
    ];

    public function getClient ()
    {
        return $this->hasOne(Client::class, 'id_card', 'id');
    }
}
