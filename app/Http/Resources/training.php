<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class training extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
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
                'created_at'=>\Morilog\Jalali\CalendarUtils::convertNumbers(jdate($this->created_at)->format('Y-m-d H:i')),
//                'created_at' => \Morilog\Jalali\Jalalian::forge( $this->created_at )->ago(),
                'mager' => $this->mager,
//                'expire'=> $this->expire,
                'online_type'=>$this->online_type,
                'website'=>$this->website,
                'fake_id'=>$this->fake_id,
                'gender'=>$this->gender,
                'like'=>$this->like,
                'user_id'=>$this->user_id,


            ];
    }
}
