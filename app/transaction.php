<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

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
    public function getDisplayAmountAttribute()
    {
        return '£' . number_format(round($this->amount / 100, 2), 2);
    }
}
