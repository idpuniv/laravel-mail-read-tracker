<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Email extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'subject' => $this->subject,
            'body' => $this->body,
            'created_at' => $this->created_at,
            'report' =>  $this->when($request->route()->getName() == 'mail.reports', function(){
                return new ReportCollection($this->report);
            })
        ];
    }
}
