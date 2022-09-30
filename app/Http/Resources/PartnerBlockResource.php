<?php

namespace App\Http\Resources;

use App\Models\Partner;
use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerBlockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'    =>  $this->id,
            'title' =>  Translate::where('id', $this->title)->value($request->lang),
            'content' =>  Translate::where('id', $this->content)->value($request->lang),
            'partners'  => PartnerResource::collection(Partner::where('block_id', $this->id)->get()),
        ];
    }
}
