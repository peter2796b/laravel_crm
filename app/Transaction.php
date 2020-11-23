<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        //its best practice to store properties such as amount in its lowest possible denomination
        //convert pounds to pence and store the amount in pence
        self::creating(function ($transaction) {
            $transaction->amount *= 100;
        });

        self::updating(function ($transaction) {
            $transaction->amount *= 100;
        });

    }


    /*
     * Associations
     */
    public function Client()
    {
        return $this->belongsTo(Client::class);
    }


    /*
     * Accessors
     */

    /**
     * return amount to be displayed
     * @return string
     */
    public function getDisplayAmountAttribute()
    {
        return '£' . number_format(round($this->amount / 100, 2), 2);
    }
}
