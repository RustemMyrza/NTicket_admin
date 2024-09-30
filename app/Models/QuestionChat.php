<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionChat extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'question_chats';

    protected $fillable = [
        'question',
        'answer',
        'asked'
    ];

    public function getAskedPerson()
    {
        return $this->hasOne(Client::class, 'id', 'asked');
    }
}
