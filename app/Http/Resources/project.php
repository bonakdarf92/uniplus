<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class project extends Resource
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
               'mager'=>$this->mager,
               'like'=>$this->like,
               'user_id'=>$this->user_id,
//               'expire'=>$this->expire,
               'created_at'=>\Morilog\Jalali\CalendarUtils::convertNumbers(jdate($this->created_at)->format('Y-m-d H:i')),
//               'created_at' => \Morilog\Jalali\Jalalian::forge( $this->created_at )->ago()

           ];
    }
}
