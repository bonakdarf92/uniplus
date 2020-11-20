<?php

namespace App\Http\Controllers;

use App\Http\Resources\awardCollection;
use App\Http\Resources\productCollection;
use App\Models\action;
use App\Models\advertise;
use App\Models\award;
use App\Models\book;
use App\Models\favorite;
use App\Models\image;
use App\Models\User;
use App\Models\user_action;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DB;

class UserController extends Controller
{
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }

    public function myteezer(Request $request)
    {
        $data = collect([]);
        $user = User::find(Auth::user()->id);
        Log::info('user id: '.$user->id.' phone:'.$user->phone. 'user agent:'.$request->header('User-Agent'));

        $data=advertise::where('user_id','=',$user->id)->orderBy('created_at', 'desc')->paginate(18);

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
    public function addtofavorite(Request $request){
        $user = User::find(Auth::user()->id);
        $book = new favorite();
        $book->user_id = $user->id;
        $book->adver_id = $request->id;
        $book->save();
        return response()->json($book);
    }
    public function deletefromfavorite($id){
        $advertise = favorite::where('user_id', '=', Auth::user()->id)->where('adver_id', '=', $id)->first();
        $advertise->delete();
        return response()->json("deleted");
    }

    public function myfavorite(Request $request)
    {
        $data = collect([]);
        $user = User::find(Auth::user()->id);
        $favorite = favorite::where('user_id','=', $user->id)->orderBy('created_at', 'desc')->get();
//        return response()->json($favorite);
        if($favorite!=null){
            foreach($favorite as $favo){
                $favorite1 = advertise::where('id', $favo->adver_id)->first();
                $data->add($favorite1);
            }
            $i = 0;
            foreach($data as $sd){
                $images = image::where('adver_id', $sd->id)->get();
                if(!$images->isEmpty()){
                    $data[$i]->image1= $images[0]->image;
                }
                $i=$i+1;
            }
            $advertises = $data->paginate(18);
            return new productCollection($advertises);
        }
        else{
            return response()->json("is empty");
        }
    }

    public function myfavoriteapi(Request $request)
    {
        $data = collect([]);
        $user = User::find(Auth::user()->id);
        $data= advertise::select(['advertises.*'])
            ->join('favorites', 'favorites.adver_id', '=', 'advertises.id')
            ->where('favorites.user_id', 'like', $user->id )
            ->orderBy('favorites.created_at', 'desc')->paginate(18);

        if($data) {
            $i = 0;
            foreach ($data as $sd) {
                $images = image::where('adver_id', $sd->id)->get();
                if (!$images->isEmpty()) {
                    $data[$i]->image1 = $images[0]->image;
                }
                $i = $i + 1;
            }
            return new productCollection($data);
        }
        else{
            return response()->json("is empty");
        }
    }
//show user detail
    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }
    public function MyAwards(){
        $user = User::find(Auth::user()->id);
        $Awards = award::where('score', $user->total_score)->get();
        if($Awards){
            return new awardCollection($Awards);}
        else{
            return response()->json("is empty");
        }
    }
    public function getAward(Request $request){
        $user = User::find(Auth::user()->id);
        $award_counter=0;
        if(($user->award_counter%2)!=0){
            if($request->award==1 || $request->award==2 ) {
                $user->award_counter=$user->award_counter*2;
                $user->save();
                $award_counter=1;
            }
        }
        if(($user->award_counter%3)!=0){
            if($request->award==3 || $request->award==4   ) {
                $user->award_counter=$user->award_counter*3;
                $user->save();
                $award_counter=1;
            }
        }
        if(($user->award_counter%5)!=0){
            if($request->award==5 || $request->award==6 ) {
                $user->award_counter=$user->award_counter*5;
                $user->save();
                $award_counter=1;
            }
        }
        if($award_counter==1){
            return response()->json("success");
        }
        else{
            return response()->json("failed");
        }
    }

    //insert user info
    public function SaveUserInfo(Request $request){
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'city' => 'required',
            'university' => 'required',
            'karshenasi' => 'required',
            'gender' => 'required',
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        try{
        DB::beginTransaction();
        $user = User::find(Auth::user()->id);
        $user->name = $request->get('name');
        $user->lastname = $request->get('lastname');
        $user->city = $request->get('city');
        $user->university = $request->get('university');
        $user->karshenasi = $request->get('karshenasi');
        $user->gender = $request->get('gender');
        if ($request->get('arshad')) {
            $user->arshad = $request->get('arshad');
        }
        if ($request->get('doctori')) {
            $user->doctori = $request->get('doctori');
        }
        if ($request->get('description')) {
            $user->description = $request->get('description');
        }
        $action = action::where('id', '=', 4)->first();
        $user_action= new user_action;
        $user_action->user_id=$user->id;
        $user_action->action_id=$action->id;
        $user_action->save();
        //add user total score
        $user->total_score=$user->total_score+$action->score;
        $user->update();
        DB::commit();
        return response()->json("success", 200);
        }
        catch (\Exception $e){
        DB::rollBack();
            return response()->json("faild", 500);
        }
    }
    public function getUserInfo(){

    }
    public function getSomeElseUserInfo(Request $request){
            $user = User::where(id,'=',$request->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }
    public function profile($user_id){
        $user = User::find($user_id);
        return response()->json([
            'status' => 'succes66s',
            'data' => $user
        ]);
    }
}
