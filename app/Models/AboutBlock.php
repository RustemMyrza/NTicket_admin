<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutBlock extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'about_blocks';

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
    protected $fillable = ['content', 'image'];

    public function getContent()
    {
        return $this->hasOne(Translate::class, 'id', 'content');
    }

    
}
