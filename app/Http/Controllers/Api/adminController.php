<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\book as bookResource;
use App\Http\Resources\furniture as furnitureResource;
use App\Http\Resources\outfit as outfitResource;
use App\Http\Resources\productCollection;
use App\Http\Resources\userCollection;
use App\Http\Resources\contactusCollection;
use App\Http\Resources\project as projectResource;
use App\Http\Resources\roomMate as roomMateResource;
use App\Http\Resources\training as trainingResource;
use App\Models\advertise;
use App\Models\book;
use App\Models\contactUs;
use App\Models\furniture;
use App\Models\image;
use App\Models\outfit;
use App\Models\project;
use App\Models\roomMate;
use App\Models\training;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class adminController
{
    public function index(){
        return view("admin");
    }
    public function notverifiedlist(Request $request)
    {
        $data = collect([]);
        $data = advertise::where('status','=',0)->orderBy('created_at', 'desc')->paginate(18);
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
    public function confirmteezer(Request $request)
    {
        $adver = advertise::where('id','=',$request->get('id'))->first();
        $adver->status= true;
        $adver->update();
    }
    public function showTeezer(Request $request)
    {
        $adver = advertise::where('slug', $request->slug)->first();
        $adver->like=false;
        if ($request->category_id == 1) {
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
            $adver->telegram = $user->telegam;
            return new bookResource($adver);
        }
        if ($request->category_id == 2) {
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
            $adver->telegram = $user->telegam;
            return new furnitureResource($adver);
        }
        if ($request->category_id == 3) {
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
        if ($request->category_id == 4) {
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
        if ($request->category_id == 5) {
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
        if ($request->category_id == 6) {
            $training = training::where('adver_id', $adver->id)->first();
            $adver->mager = $training->mager;
//            $adver->expire = $training->expire;
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
    //admin auth
    //register
    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }
    public function deleteteezer(Request $request){
        $advertise=advertise::where('id','=', $request->id)->first();
        $advertise->delete();
        return response()->json("deleted");
    }
    private function guard()
    {
        return Auth::guard();
    }
    public function users(Request $request)
    {
        $user = User::select('id','phone','isverified','role','created_at','total_score')->orderBy('created_at', 'desc')->paginate(18);
        return response()->json($user, 200);
    }
    public function advertises(Request $request)
    {
        $data = collect([]);
        $data = advertise::where('status','=',1)->orderBy('created_at', 'desc')->paginate(18);
        return new productCollection($data);
    }
    public function books(Request $request)
    {
        $data = collect([]);
        $data = advertise::where('category_id', 1)->orderBy('created_at', 'desc')->paginate(18);
        return new productCollection($data);
    }
    public function furnitures(Request $request)
    {
        $data = collect([]);
        $data = advertise::where('category_id', 2)->orderBy('created_at', 'desc')->paginate(18);
        return new productCollection($data);
    }
    public function outfits(Request $request)
    {
        $data = collect([]);
        $data = advertise::where('category_id', 3)->orderBy('created_at', 'desc')->paginate(18);
        return new productCollection($data);
    }
    public function projects(Request $request)
    {
        $data = collect([]);
        $data = advertise::where('category_id', 4)->orderBy('created_at', 'desc')->paginate(18);
        return new productCollection($data);
    }
    public function roommates(Request $request)
    {
        $data = collect([]);
        $data = advertise::where('category_id', 5)->orderBy('created_at', 'desc')->paginate(18);
        return new productCollection($data);
    }
    public function trainings(Request $request)
    {
        $data = collect([]);
        $data = advertise::where('category_id', 6)->orderBy('created_at', 'desc')->paginate(18);
        return new productCollection($data);
    }
    public function contactus(Request $request)
    {
        $data = collect([]);
        $data = contactUs::all()->orderBy('created_at', 'desc')->paginate(18);
        return new contactusCollection($data);
    }
    public function advertiseCounter(Request $request)
    {
        $data = advertise::count();
        return response()->json($data);
    }
    public function userCounter(Request $request)
    {
        $data = User::count();
        return response()->json($data);
    }
    public function deleteUser(Request $request)
    {
        $user=User::find($request->id);
        $user->delete();
        return response()->json("deleted");
    }

}
