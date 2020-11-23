<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Transaction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'client_avatar' => $this->client->avatar,
            'client_name' => $this->client->fullname,
            'amount' => $this->display_amount,
            'transaction_date' => $this->transaction_date,
        ];
    }
}
