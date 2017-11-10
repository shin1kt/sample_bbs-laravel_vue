<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Post extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // dd($this->created_at);
        return [
          'id' => $this->id,
          'title' => $this->title,
          'content' => $this->content,
          'date' => $this->created_at->format('Y-m-d'),
        ];
    }
}
