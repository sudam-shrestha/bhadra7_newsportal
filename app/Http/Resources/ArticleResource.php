<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            "image" => asset(Storage::url($this->image)),
            "meta_title"=>$this->meta_title,
            "meta_description"=>$this->meta_description,
            "author_name"=>$this->author->name,
            "author_image"=> asset(Storage::url($this->author->image)),
            "published_at"=>$this->created_at->format('d M, Y')
        ];
    }
}
