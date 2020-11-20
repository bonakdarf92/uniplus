<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class awardCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($page){
                return [
                    'id'=>$page->id,
                    'score' => $page->score,
                    'title' => $page->title,
                    'active' => $page->active,
                ];
            }),
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'success'
        ];
    }
}
