<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Socialite;
use App\Location;

class SocialAuthController extends Controller
{
    public function redirect($service) {
        return Socialite::driver ( $service )->redirect ();
    }
    
    public function callback($service) {
        $user = Socialite::with ( $service )->user ();
        return view ( 'home' )->withDetails ( $user )->withService ( $service );
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchLocation(Request $request) {
       if(isset($request['location_id']) && !empty($request['location_id'])) {
           $locationData = DB::table('locations')->where('id',$request['location_id'])->first();
           $response = [
               'status' => 1,
               'data' => $locationData
           ];
           return response()->json($response);
       }
    }
}
