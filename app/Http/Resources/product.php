<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Verta;

class product extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data=jdate();
//      return parent::toArray($request);
        return [
            'id' => $this->id,
            'slug'=>$this->slug,
            'category_id'=>$this->category_id,
            'title' => $this->title,
            'needtype' => $this->needtype,
            'price' => $this->price,
            'city'=> $this->city,
            'description'=>$this->description,
            'connection'=>$this->connection,
            'answer_time'=>$this->answer_time,
            'immidiatetype'=>$this->immidiatetype,
            'fake_id'=>$this->fake_id,
            'university'=>$this->university,
            'image1'=>$this->image1,
            'image2'=>$this->image2,
            'counter'=>$this->counter,
            'phone'=>$this->phone,
            'telegram'=>$this->telegram,
            'like'=>$this->like,
            'connection'=>$this->connection,
//            'status'=>$this->status,
            'created_at'=>\Morilog\Jalali\CalendarUtils::convertNumbers(jdate($this->created_at)->format('Y-m-d H:i')),
//            'created_at' => \Morilog\Jalali\Jalalian::forge( $this->created_at )->ago()
        ];
    }
}
