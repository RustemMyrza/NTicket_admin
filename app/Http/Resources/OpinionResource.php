<?php

namespace App\Http\Resources;

use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class OpinionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = $request->lang;

        return [
            'content' => Translate::where('id', $this->content)->value($lang),
            'created_at' => $this->created_at,
            'id' => $this->id,
            'image' => $this->image,
            'meta_description' => isset($this->meta_description) ? Translate::where('id', $this->meta_description)->value($lang) : null,
            'meta_title' => isset($this->meta_title) ? Translate::where('id', $this->meta_title)->value($lang) : null,
            'title' => Translate::where('id', $this->title)->value($lang),
            'viewing' => $this->viewing,
        ];
    }
}
