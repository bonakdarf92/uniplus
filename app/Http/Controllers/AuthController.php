<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user_action;
use App\Models\action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar;
use DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $v = Validator::make($request->all(), [
            'phone' => 'required|unique:users'
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        DB::beginTransaction();
        try {
            if ($request->identify) {
                $find_user = User::where('identify_id', '=', $request->identify)->first();
                if ($find_user) {
                    $action = action::where('id', '=', 3)->first();
                    $find_user->total_score = $find_user->total_score + $action->score;
                    $find_user->update();
                }
            }
            $user = new User;
            $user->phone = $request->phone;
            $user->identify_id = str_random(3) . substr($request->phone, -2);
            $verify = random_int(11111, 99999);
            $this->verification($verify,$request->phone);
            $user->otp = $verify;
            $user->expire_otp = Carbon::now()->toDateTimeString();
            $user->save();
            DB::commit();
            return response()->json(['status' => 'success'], 200);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json("faild", 500);
        }
    }

    public function registerlogin(Request $request)
    {

        $v = Validator::make($request->all(), [
            'otp' => 'required'
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $credentials = $request->only('otp');
        $user = User::where('phone', '=', $request->phone)->first();
        if ($user->otp == $request->otp && $user) {
            if (Carbon::now()->diffInMinutes($user->expire_otp) < 5){
                if ($token = $this->guard()->attempt($credentials)) {
                DB::beginTransaction();
                try{
                    $action = action::where('id', '=', 1)->first();
                    $user_action= new user_action;
                    $user_action->user_id=$user->id;
                    $user_action->action_id=$action->id;
                    $user_action->save();
                    //add user total score
                    $user->total_score=$user->total_score+$action->score;
                    $user->isverified = 1;
                    $user->update();
                    DB::commit();
                    return response()->json(['token' => $token], 200)->header('Authorization', $token);
                }catch (\Exception $e){
                    DB::rollBack();
                    return response()->json("faild", 500);
                }
                }
            }
            else {
                return response()->json(['message' => 'login_delay'], 401);
            }
        }
        return response()->json(['error' => 'login_error'], 402);
    }

    //login
    public function loginverify(Request $request)
    {
        $v = Validator::make($request->all(), [
            'phone' => 'required'
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        DB::beginTransaction();
        try {
        $user=User::where('phone', '=', $request->phone)->first();
        if($user!=null)
        {
            $verify=random_int(11111,99999);
            $user->expire_otp=Carbon::now()->toDateTimeString();
            $this->verification($verify,$request->phone);
            $user->otp=$verify;
            $user->update();
            DB::commit();
            return response()->json(['status' => 'success'], 200);
        }  else{
            return response()->json(['status' => 'failed. user doesnt in db']);
        }
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json("faild", 500);
        }

    }

    public function login(Request $request)
    {
        $v = Validator::make($request->all(), [
            'otp' => 'required'
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $credentials = $request->only('otp');
        $user = User::where('phone', '=', $request->phone)->first();
        if ($user->otp == $request->otp && $user) {
            if (Carbon::now()->diffInMinutes($user->expire_otp) < 5){
                if ($token = $this->guard()->attempt($credentials)) {
                    DB::beginTransaction();
                    try{
                        if($user->isverified!=1){
                            $action = action::where('id', '=', 1)->first();
                            $user_action = new user_action;
                            $user_action->user_id = $user->id;
                            $user_action->action_id = $action->id;
                            $user_action->save();
                            //add user total score
                            $user->total_score=$user->total_score+$action->score;
                            $user->isverified = 1;
                            $user->update();
                        }
                        DB::commit();
                        return response()->json(['token' => $token], 200)->header('Authorization', $token);
                    }catch (\Exception $e){
                        DB::rollBack();
                        return response()->json("faild", 500);
                    }
                }
            }
            else {
                return response()->json(['message' => 'login_delay'], 401);
            }
        }
        return response()->json(['error' => 'login_error'], 402);
    }

    public function verification($verify,$phone)
    {
        try{
            $receptor =  $phone;
            $template =  "myteezer";
            $type =  "sms";
            $token =  $verify;
            $token2 =  "";
            $token3 =  "";
            $result = Kavenegar::VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
//            $this->format($result);
        }
        catch(ApiException $e){
            echo $e->errorMessage();
        }
        catch(HttpException $e){
            echo $e->errorMessage();
        }
    }

    private function format($result)
    {
        if($result){
            echo "<pre>";
            foreach($result as $r){
                echo sprintf(self::FORMAT, "messageid", $r->messageid);
                echo sprintf(self::FORMAT, "message", $r->message);
                echo sprintf(self::FORMAT, "status", $r->status);
                echo sprintf(self::FORMAT, "statustext", $r->statustext);
                echo sprintf(self::FORMAT, "sender", $r->sender);
                echo sprintf(self::FORMAT, "receptor", $r->receptor);
                echo sprintf(self::FORMAT, "date", $r->date);
                echo sprintf(self::FORMAT, "cost", $r->cost);
                echo "<hr/>";
            }
            echo "</pre>";
        }
    }

    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }
    private function guard()
    {
        return Auth::guard();
    }
}
