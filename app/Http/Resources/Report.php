<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Report extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return 
        [
            'id' => $this->id,
            'receiver_addr' => $this->receiver_addr,
            'open' => $this->clics > 0 ? 'yes' : 'no',
            'openCount' => $this->clics,
            'open_date' => $this->open_date,
        ];
    }
}
