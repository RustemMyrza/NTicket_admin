<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'analytics';

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
    protected $fillable = ['title', 'content', 'viewing', 'image', 'category', 'meta_title', 'meta_description'];

    public function getTitle()
    {
        return $this->hasOne(Translate::class, 'id', 'title');
    }

    public function getContent()
    {
        return $this->hasOne(Translate::class, 'id', 'content');
    }

    public function category()
    {
        return $this->hasOne(Translate::class, 'id', 'category');
    }

    protected function metaTitle()
    {
        return $this->hasOne(Translate::class, 'id', 'meta_title');
    }

    protected function metaDescription()
    {
        return $this->hasOne(Translate::class, 'id', 'meta_description');
    }
}
