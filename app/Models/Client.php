<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'users';

    protected $fillable = [
        'name',
        'surname',
        'middle_name',
        'birth_date',
        'email',
        'password',
    ];

    public function getTickets()
    {
        return $this->hasMany(Ticket::class, 'passenger', 'id');
    }

    public function getBankCard()
    {
        return $this->hasOne(BankCard::class, 'id', 'bank_card');
    }

    public function getIdCard()
    {
        return $this->hasOne(IdCard::class, 'id', 'id_card');
    }
}
