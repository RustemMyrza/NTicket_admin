<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['phone_number', 'email', 'address', 'address2', 'description', 'whats_app', 'telegram', 'facebook', 'insta', 'link'];

    protected function phone()
    {
        return $this->hasOne(Translate::class, 'id', 'phone_number');
    }

    protected function getEmail()
    {
        return $this->hasOne(Translate::class, 'id', 'email');
    }

    protected function getAddress()
    {
        return $this->hasOne(Translate::class, 'id', 'address');
    }

    protected function getAddress2()
    {
        return $this->hasOne(Translate::class, 'id', 'address2');
    }

    protected function whatsapp()
    {
        return $this->hasOne(Translate::class, 'id', 'whats_app');
    }

    protected function telega()
    {
        return $this->hasOne(Translate::class, 'id', 'telegram');
    }

    protected function face()
    {
        return $this->hasOne(Translate::class, 'id', 'facebook');
    }

    protected function instagram()
    {
        return $this->hasOne(Translate::class, 'id', 'insta');
    }

    protected function getLink()
    {
        return $this->hasOne(Translate::class, 'id', 'link');
    }
}
