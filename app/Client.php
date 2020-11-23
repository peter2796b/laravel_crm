<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id'];

    //no timestamps on the entity
    public $timestamps = false;


    /*
     * Associations
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /*
     * Accessors
     */

    /**
     * full name of the client
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
