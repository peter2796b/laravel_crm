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
        return $this->hasMany(transaction::class);
    }

    /*
     * Accessors
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
