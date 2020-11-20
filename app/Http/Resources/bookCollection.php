<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class bookCollection extends ResourceCollection
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
                'author' => $page->author,
                'publisher' => $page->publisher, 'created_at'=>\Morilog\Jalali\CalendarUtils::convertNumbers(jdate($page->created_at)->format('Y-m-d H:i'))
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
