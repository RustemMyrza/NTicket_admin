<?php

namespace App\Http\Resources;

use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class AnalyticsResource extends JsonResource
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
            'id' => $this->id,
            'title' => Translate::where('id', $this->title)->value($lang),
            'content' => Translate::where('id', $this->content)->value($lang),
            'viewing' => $this->viewing,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'category'  => isset($this->category) ? Translate::where('id', $this->category)->value($lang) : null,
            'meta_title'    =>  $this->metaTitle->$lang,
            'meta_description'    =>  $this->metaDescription->$lang,
        ];
    }
}
