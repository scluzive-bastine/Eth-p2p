<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Profile');
    }
    /**
     * Get users info
     */
    public function getProfile()
    {
        return Auth::user();
    }
    /**
     * Update terms of trade
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateTerms(Request $request)
    {
        $value = $request->value;
        $length = strlen($value);

        if($length > 500)
            return ["error"=>"Must be less than 500 characters"];
        elseif($length <= 0)
            return ["error"=>"cannot be empty"];

        $user = Auth::user();
        $user->terms = $value;
        $user->save();
        return [
            "success"=>"Updated",
            "terms"=>$value
        ];
    }

    /**
     * Update terms of trade
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateBlurb(Request $request)
    {
        $value = $request->value;
        $length = strlen($value);

        if($length > 500)
            return ["error"=>"Must be less than 500 characters"];
        elseif($length <= 0)
            return ["error"=>"cannot be empty"];

        $user = Auth::user();
        $user->blurb = $value;
        $user->save();
        return [
            "success"=>"Updated",
            "blurb"=>$value
        ];        
    }

}
