<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\book as bookResource;
use App\Http\Resources\furniture as furnitureResource;
use App\Http\Resources\outfit as outfitResource;
use App\Http\Resources\project as projectResource;
use App\Http\Resources\roomMate as roomMateResource;
use App\Http\Resources\training as trainingResource;
use App\Http\Resources\productCollection;
use App\Models\advertise;
use App\Models\book;
use App\Models\city_university;
use App\Models\favorite;
use App\Models\furniture;
use App\Models\outfit;
use App\Models\project;
use App\Models\roomMate;
use App\Models\training;
use App\Models\image;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class productController extends Controller
{
    public function images(){
        $data = collect([]);
        $data[0] = 'www.uniplus.app/images/slider/book.jpg';
        $data[1] = 'www.uniplus.app/images/slider/furniture.jpg';
        $data[2] = 'www.uniplus.app/images/slider/outfit.jpg';
        $data[3] = 'www.uniplus.app/images/slider/project.jpg';
        $data[4] = 'www.uniplus.app/images/slider/roommate.jpg';
        $data[5] = 'www.uniplus.app/images/slider/training.jpg';
//        return Response::download($data);
        return response()->json($data);
    }
    public function get_city(){
        $data = city_university::groupBy('city')->select('city')->get();
        return response()->json($data);
    }
    public function allunis(){
        $data = city_university::select('university')->get();
        return response()->json($data);
    }
    public function get_uni(Request $request)
    {
        $searchuni = $request->city;
        $data = city_university::select('university')->where('city', $searchuni)->get();
        return response()->json($data);
    }
    public function get_category(){
        $data = category::select('id')->get();
        return response()->json($data);
    }
    public function index()
    {
        $data = collect([]);
        $data = advertise::where('status','=',1)->orderBy('created_at', 'desc')->paginate(18);
        $i = 0;
        foreach($data as $sd){
            $images = image::where('adver_id', $sd->id)->get();
            if(!$images->isEmpty()){
                $data[$i]->image1= $images[0]->image;
            }
            $i=$i+1;
        }
        return new productCollection($data);
    }
    public function search(Request $request)
    {
        $searchTitle = $request->title;
        $searchCategory = $request->category;
        $searchUni = $request->uni;
        $searchCity = $request->city;
        if ($searchTitle || $searchCategory || $searchUni || $searchCity) {
            $ads = advertise::when($searchCategory, function ($query) use ($searchCategory) {
                return $query->where('category_id', 'like', "%{$searchCategory}%");
            })
                ->when($searchUni, function ($query) use ($searchUni) {
                    return $query->where('university', 'like', "%{$searchUni}%");
                })
                ->when($searchCity, function ($query) use ($searchCity) {
                    return $query->where('city', 'like', "%{$searchCity}%");
                })
                ->when($searchTitle, function ($query) use ($searchTitle) {
                    return $query->where('title', 'like', "%{$searchTitle}%");
                })
                ->where('status','=',1)->orderBy('created_at', 'desc')->paginate(18)
                ->appends(request()->query());
        } else {
            $ads = advertise::where('status','=',1)->orderBy('created_at', 'desc')->paginate(18);

        }
        $i = 0;
        foreach($ads as $sd){
            $images = image::where('adver_id', $sd->id)->get();
            if(!$images->isEmpty()){
                $ads[$i]->image1= $images[0]->image;
            }
            $i=$i+1;
        }
        return new productCollection($ads);
    }

    public function showTeezer($category_id, $slug)
    {
        $adver = advertise::where('slug', $slug)->first();
        $adver->like=false;
        if(Auth::user()){
            $favorite = favorite::where('user_id',Auth::user()->id)->where('adver_id',$adver->id)->get();
            if(!$favorite->isEmpty()){
                $adver->like=true;
            }
        }

        if ($category_id == 1) {
            $book = book::where('adver_id', $adver->id)->first();
            $adver->author = $book->author;
            $adver->publisher = $book->publisher;
            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){
                $adver->image1 = $images[0]->image;
                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user = User::find($adver->user_id);
            $adver->phone = $user->phone;
            $adver->telegram = $user->telegram;
            return new bookResource($adver);
        }
        if ($category_id == 2) {
          $furniture=furniture::where('adver_id', $adver->id)->first();
          $adver->furniture_type=$furniture->furniture_type;
          //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user = User::find($adver->user_id);
            $adver->phone = $user->phone;
            $adver->telegram = $user->telegram;
            return new furnitureResource($adver);
        }
        if ($category_id == 3) {
            $outfit = outfit::where('adver_id', $adver->id)->first();
            $adver->destination = $outfit->destination;
            $adver->gender = $outfit->gender;
            $adver->car_type = $outfit->car_type;
            $adver->car_brand = $outfit->car_brand;
            $adver->date_day = $outfit->date_day;
            $adver->date_hour = $outfit->date_hour;
            $adver->number = $outfit->number;

            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user = User::find($adver->user_id);
            $adver->phone = $user->phone;
            $adver->telegram = $user->telegram;
            return new outfitResource($adver);
        }
        if ($category_id == 4) {
            $project = project::where('adver_id', $adver->id)->first();
            $adver->mager = $project->mager;
            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user=User::find($adver->user_id);
            $adver->phone=$user->phone;
            $adver->telegram=$user->telegram;
            return new projectResource($adver);
        }
        if ($category_id == 5) {
            $roomMate = roomMate::where('adver_id', $adver->id)->first();
            $adver->address = $roomMate->address;
            $adver->gender = $roomMate->gender;
            $adver->max_prepayment = $roomMate->max_prepayment;
            $adver->room_count = $roomMate->room_count;
            $adver->measure = $roomMate->measure;
            $adver->need_count = $roomMate->need_count;
            $adver->real_count = $roomMate->real_count;
            $adver->daily_payment = $roomMate->daily_payment;
            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user=User::find($adver->user_id);
            $adver->phone=$user->phone;
            $adver->telegram=$user->telegram;
            return new roomMateResource($adver);
        }
        if ($category_id == 6) {
            $training = training::where('adver_id', $adver->id)->first();
            $adver->mager = $training->mager;
            $adver->gender = $training->gender;
            $adver->online_type = $training->online_type;
            $adver->website = $training->website;
            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user=User::find($adver->user_id);
            $adver->phone=$user->phone;
            $adver->telegram=$user->telegram;
            return new trainingResource($adver);
        }
    }
    public function showTeezerfake($category_id, $fake_id)
    {
        $adver = advertise::where('fake_id', $fake_id)->first();
        if ($category_id == 1) {
            $book = book::where('adver_id', $adver->id)->first();
            $adver->author = $book->author;
            $adver->publisher = $book->publisher;
            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user = User::find($adver->user_id);
            $adver->phone = $user->phone;
            $adver->telegram = $user->telegram;
            return new bookResource($adver);
        }
        if ($category_id == 2) {
            $furniture=furniture::where('adver_id', $adver->id)->first();
            $adver->furniture_type=$furniture->furniture_type;
            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user = User::find($adver->user_id);
            $adver->phone = $user->phone;
            $adver->telegram = $user->telegram;
            return new furnitureResource($adver);
        }
        if ($category_id == 3) {
            $outfit = outfit::where('adver_id', $adver->id)->first();
            $adver->destination = $outfit->destination;
            $adver->gender = $outfit->gender;
            $adver->car_type = $outfit->car_type;
            $adver->car_brand = $outfit->car_brand;
            $adver->date_day = $outfit->date_day;
            $adver->date_hour = $outfit->date_hour;
            $adver->number = $outfit->number;
            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user = User::find($adver->user_id);
            $adver->phone = $user->phone;
            $adver->telegram = $user->telegram;
            return new outfitResource($adver);
        }
        if ($category_id == 4) {
            $project = project::where('adver_id', $adver->id)->first();
            $adver->mager = $project->mager;
            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user=User::find($adver->user_id);
            $adver->phone=$user->phone;
            $adver->telegram=$user->telegram;
            return new projectResource($adver);
        }
        if ($category_id == 5) {
            $roomMate = roomMate::where('adver_id', $adver->id)->first();
            $adver->address = $roomMate->address;
            $adver->gender = $roomMate->gender;
            $adver->max_prepayment = $roomMate->max_prepayment;
            $adver->room_count = $roomMate->room_count;
            $adver->measure = $roomMate->measure;
            $adver->need_count = $roomMate->need_count;
            $adver->real_count = $roomMate->real_count;
            $adver->daily_payment = $roomMate->daily_payment;
            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user=User::find($adver->user_id);
            $adver->phone=$user->phone;
            $adver->telegram=$user->telegram;
            return new roomMateResource($adver);
        }
        if ($category_id == 6) {
            $training = training::where('adver_id', $adver->id)->first();
            $adver->mager = $training->mager;
            $adver->gender = $training->gender;
            $adver->online_type = $training->online_type;
            $adver->website = $training->website;
            //image
            $images = collect([]);
            $images = image::where('adver_id', $adver->id)->get();
            if($images->count()==2){

                $adver->image1 = $images[0]->image;

                $adver->image2 = $images[1]->image;
            }
            if($images->count()==1)
            {
                $adver->image1 = $images[0]->image;
            }
            //user
            $user=User::find($adver->user_id);
            $adver->phone=$user->phone;
            $adver->telegram=$user->telegram;
            return new trainingResource($adver);
        }
    }

    public function increasecounter(Request $request)
    {
        if(Auth::user()) {
            $adver = advertise::where('id', $request->id)->increment('counter', 1);
            return response()->json("user is login,counter increaced");
        }else{
            return response()->json("user is not login");
        }

    }
    public function deleteproduct(Request $request){
        $advertise=advertise::where('id','=', $request->id)->first();
        $advertise->delete();
        return response()->json("deleted");
    }

}


