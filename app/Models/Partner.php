<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partner';

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
    protected $fillable = ['title', 'content', 'image', 'block_id'];

    public function getTitle(){
        return $this->hasOne(Translate::class, 'id','title');
    }
    public function getContent()
    {
        return $this->hasOne(Translate::class, 'id', 'content');
    }
}
