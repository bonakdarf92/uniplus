<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\productCollection;
use App\Models\advertise;
use App\Models\image;
use App\Models\training;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class trainingController extends Controller
{
    public function index()
    {
        $data = collect([]);
        $data = advertise::where('category_id', 6)->orderBy('created_at', 'desc')->paginate(18);
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

    public function store(Request $request, Filesystem $filesystem)
    {
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'needtype' => 'required',
            'city' => 'required',
            'connection' => 'required',
            'university' => 'required',
            'connection' => 'required',
            'mager' => 'required',
            'gender' => 'required',
            'online_type' => 'required',
            'image1' => 'sometimes|mimes:jpeg,bmp,png,jpg|max:1024',
            'image2' => 'sometimes|mimes:jpeg,bmp,png,jpg|max:1024',
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $advertise = new advertise();
        if ($request->get('price')) {
            $advertise->price = $request->get('price');
        }
        if ($request->get('description')) {
            $advertise->description = $request->get('description');
        }
        if ($request->get('answer_time')) {
            $advertise->answer_time = $request->get('answer_time');
        }
        $advertise->category_id = $request->get('category_id');
        $advertise->needtype = $request->get('needtype');
        $advertise->title = $request->get('title');
        $advertise->city = $request->get('city');
        $advertise->connection = $request->get('connection');
        $advertise->immidiatetype = $request->get('immidiatetype');
        $advertise->university = $request->get('university');
        $advertise->fake_id = Str::random(10);
        $advertise->user_id = Auth::user()->id;
        $advertise->save();
        //user
        if ($request->get('telegram')) {
            $user = User::find($advertise->user_id);
            $user->telegram = $request->get('telegram');
            $user->update();
        }
        //book
        $book = new training();
        $book->mager = $request->get('mager');
        $book->gender = $request->get('gender');
        $book->online_type = $request->get('online_type');
        if ($request->file('website')) {
            $book->website = $request->get('website');
        }
        $book->adver_id = $advertise->id;
        $book->save();

        $adver = $advertise->id;
        $imagePath = "/upload/images/{$adver}";
        if($request->file('image1'))
        {
            $file1 = $request->file('image1');
            $filename1 = 1;
            if ($filesystem->exists(public_path("{$imagePath}/{$filename1}"))) {
                $filename1 = Carbon::now()->timestamp . "-{$filename1}";
            }
            $file1->move(public_path($imagePath), $filename1);
            ////image1
            $image1 = new image();
            $image1->adver_id = $adver;
            $image1->image = url("{$imagePath}/{$filename1}");
            $image1->save();
        }
        if($request->file('image2')){
            $file2 = $request->file('image2');
            $filename2 = 2;
            if ($filesystem->exists(public_path("{$imagePath}/{$filename2}"))) {
                $filename2 = Carbon::now()->timestamp . "-{$filename2}";
            }
            $file2->move(public_path($imagePath), $filename2);
            ////image2
            $image2 = new image();
            $image2->adver_id = $adver;
            $image2->image = url("{$imagePath}/{$filename2}");
            $image2->save();
        }

        return response([
            'status' => 'success'
        ]);
    }

    public function edittraining(Request $request, Filesystem $filesystem)
    {
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'needtype' => 'required',
            'city' => 'required',
            'connection' => 'required',
            'university' => 'required',
            'mager' => 'required',
            'gender' => 'required',
            'online_type' => 'required',
            'image1' => 'sometimes|mimes:jpeg,bmp,png|max:1024',
            'image2' => 'sometimes|mimes:jpeg,bmp,png|max:1024',
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $advertise = advertise::where('id', '=', $request->get('id'))->first();
        $advertise->needtype = $request->get('needtype');
        $advertise->title = $request->get('title');
        $advertise->price = $request->get('price');
        $advertise->description = $request->get('description');
        $advertise->answer_time = $request->get('answer_time');
        $advertise->status = 0;
        $advertise->city = $request->get('city');
        $advertise->connection = $request->get('connection');
        $advertise->immidiatetype = $request->get('immidiatetype');
        $advertise->university = $request->get('university');
        $advertise->update();
        //user
        $user = User::find($advertise->user_id);
        $user->telegram = $request->get('telegram');
        $user->update();
        $book = training::where('adver_id', $advertise->id)->first();
        $book->mager = $request->get('mager');
        $book->gender = $request->get('gender');
        $book->website = $request->get('website');
        $book->online_type = $request->get('online_type');
        $book->update();
        // image1
        if ($request->get('deleteimage1') === "deleted") {
            $imagePath = "/upload/images/{$advertise->id}/1";
            $images = image::where('adver_id', $request->get('id'))->first();

            if ($images) {
                $v = $filesystem->delete(public_path($imagePath));
                $images->delete();
            }
        } elseif ($request->get('deleteimage1') === "inserted") {
            $file1 = $request->file('image1');
            $adver = $advertise->id;
            $imagePath = "/upload/images/{$adver}";
            $filename1 = $file1->getClientOriginalName();
            if ($filesystem->exists(public_path("{$imagePath}/{$filename1}"))) {
                $filename1 = Carbon::now()->timestamp . "-{$filename1}";
            }
            $file1->move(public_path($imagePath), $filename1);

            $image1 = image::where('adver_id', $advertise->id)->first();

            if ($image1) {
                $image1->image = url("{$imagePath}/{$filename1}");
                $image1->update();
            } else {
                $image1 = new image();
                $image1->adver_id = $adver;
                $image1->image = url("{$imagePath}/{$filename1}");
                $image1->save();
            }
        }
        //image2
        if ($request->get('deleteimage2')==="deleted") {
            $imagePath = "/upload/images/{$advertise->id}/2";
            $images=image::where('adver_id', $request->get('id'))->get();
            if (count($images) === 2) {
                if ($images[1]) {
                    $v = $filesystem->delete(public_path($imagePath));
                    $images->delete();
                }
            }
            else{
                $v = $filesystem->delete(public_path($imagePath));
                $images[0]->delete();
            }
        } elseif ($request->get('deleteimage2') === "inserted") {
            $file2 = $request->file('image2');
            $adver = $advertise->id;
            $imagePath = "/upload/images/{$adver}";
            $filename2 = $file2->getClientOriginalName();
            if ($filesystem->exists(public_path("{$imagePath}/{$filename2}"))) {
                $filename2 = Carbon::now()->timestamp . "-{$filename2}";
            }
            $file2->move(public_path($imagePath), $filename2);
            $image2 = image::where('adver_id', $advertise->id)->get();
            if (count($image2) === 2) {
                $image2[1]->image = url("{$imagePath}/{$filename2}");
                $image2[1]->update();
            } else {
                $image2 = new image();
                $image2->adver_id = $adver;
                $image2->image = url("{$imagePath}/{$filename2}");
                $image2->save();
            }
        }
        return response()->json("succes");
    }
}
