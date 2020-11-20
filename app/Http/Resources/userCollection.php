<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class userCollection extends ResourceCollection
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
            'data' => $this->collection->map(function($item) {
                return [
                    'phone'=>$item.phone,
                    'role'=>$item.role,
                    'isverified'=>$item.isverified,
                    'created_at'=>\Morilog\Jalali\CalendarUtils::convertNumbers(jdate($item->created_at)->format('Y-m-d H:i')),

                ];
            })
        ];
    }
}
