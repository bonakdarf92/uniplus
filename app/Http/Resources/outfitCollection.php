<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class outfitCollection extends ResourceCollection
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
        return [
            'data' => $this->collection->map(function($item) {
        return [

            'created_at'=>\Morilog\Jalali\CalendarUtils::convertNumbers(jdate($item->created_at)->format('Y-m-d H:i')),
//            'start'=> $item.start,
            'destination'=>$item.destination,
            'gender'=>$item.gender,
            'car_type'=>$item.car_type,
            'expire'=>$item.expire
        ];
            })
        ];

    }
}
