<?php

namespace App\Http\Resources;

use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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

        return [
            'id'    =>  $this->id,
            'title' =>  Translate::where('id', $this->title)->value($lang),
            'meta_title' => isset($this->meta_title) ? Translate::where('id', $this->meta_title)->value($lang) : null,
            'meta_description' => isset($this->meta_description) ? Translate::where('id', $this->meta_description)->value($lang) : null,
            'content' =>  Translate::where('id', $this->content)->value($lang),
            'viewing'   =>  $this->viewing,
            'image' =>  $this->image,
            'video' =>  $this->video,
            'link' =>  $this->link,
            'popular' =>  boolval($this->popular),
            'created_at'    =>  $this->created_at,
        ];
    }
}
