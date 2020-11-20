<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\advertise;
class CheckIsAdminOrSelf
{
    public function handle($request, Closure $next)
    {
        $requesteadverId = $request->get('id');
//        $requesteadverId = $request->route()->parameter('id');

        $advertise = advertise::where('id','=',$request->get('id'))->first();
        if(
            Auth::user()->role === 2 ||
            Auth::user()->id == $advertise->user_id
        ) {
            return $next($request);
        }
        else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}