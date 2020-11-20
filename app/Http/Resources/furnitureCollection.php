<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class furnitureCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
//    }
                return [
                    'data' => $this->collection->map(function($page) {
                        return [
                            'title' => $page->title,
                            'need' => $page->need,
                            'price' => $page->price,
                            'description'=>$page->description,
                            'immediate'=>$page->immediate,
                            'city'=> $page->city,
                            'created_at'=>\Morilog\Jalali\CalendarUtils::convertNumbers(jdate($page->created_at)->format('Y-m-d H:i'))
                        ];
                    })
                ];
    }

    public function with($request)
    {
        return [
            'status' => 'success'
        ];
    }
}
