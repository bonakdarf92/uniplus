<?php

namespace App\Http\Resources;

use App\Models\category;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Verta;

class productCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($page){
                return [
                    'id' => $page->id,
                    'slug'=>$page->slug,
                    'category_id'=>$page->category_id,
                    'title' => $page->title,
                    'needtype' => $page->needtype,
                    'price' => $page->price,
                    'city'=> $page->city,
                    'description'=>$page->description,
                    'connection'=>$page->connection,
                    'answer_time'=>$page->answer_time,
                    'immidiatetype'=>$page->immidiatetype,
//                    'fake_id'=>$this->fake_id,
                    'university'=>$page->university,
                    'counter'=>$page->counter,
                    'image1'=>$page->image1,
                    'image2'=>$page->image2,
                    'status'=>$page->status,
//                    'created_at'=>\Morilog\Jalali\CalendarUtils::convertNumbers(jdate($page->created_at)->format('Y-m-d H:i')),
                    'created_at' => \Morilog\Jalali\Jalalian::forge( $page->created_at )->ago()

                ];
            }),
        ];
    }
}
