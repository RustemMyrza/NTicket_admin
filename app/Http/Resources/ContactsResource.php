<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = $request->lang;

        return[
            'id'    =>  $this->id,
            'phone_number'  =>  $this->phone->$lang,
            'email'     =>  $this->getEmail->$lang,
            'address'   =>  $this->getAddress->$lang,
            'address2'  =>  $this->getAddress2->$lang,
            'whats_app' =>  $this->whatsapp->$lang,
            'telegram'  =>  $this->telega->$lang,
            'facebook'  =>  $this->face->$lang,
            'insta'     =>  $this->instagram->$lang,
            'link'  =>  $this->getLink->$lang,
        ];
    }
}
