<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'publication_status' => $this->publication_status,
            'poster_link' => $this->generateDownloadLink(),
            'genres' => GenreResource::collection($this->genres),
        ];
    }
    
    private function generateDownloadLink()
    {
        if ($this->poster_link) {
            $url = Storage::url('public/posters/' . $this->poster_link);
            return url($url);
        }

        return null;
    }
}
