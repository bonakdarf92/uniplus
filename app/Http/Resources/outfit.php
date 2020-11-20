<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class outfit extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

//        return parent::toArray($request);
            return [
                'id'=>$this->id,
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
                'university'=>$this->university,
                'image1'=>$this->image1,
                'image2'=>$this->image2,
                'counter'=>$this->counter,
                'phone'=>$this->phone,
                'telegram'=>$this->telegram,
                'connection'=>$this->connection,
                'fake_id'=>$this->fake_id,
                'created_at'=>\Morilog\Jalali\CalendarUtils::convertNumbers(jdate($this->created_at)->format('Y-m-d H:i')),
//                'created_at' => \Morilog\Jalali\Jalalian::forge( $this->created_at )->ago(),
//                'start'=> $this->start,
                'destination'=>$this->destination,
                'gender'=>$this->gender,
                'car_type'=>$this->car_type,
                'car_brand'=>$this->car_brand,
                'number'=>$this->number,
                'date_hour'=>$this->date_hour,
                'date_day'=>$this->date_day,
                'like'=>$this->like,

            ];
    }
}
