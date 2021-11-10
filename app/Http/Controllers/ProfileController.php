<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\BankDetail;
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
        $user = Auth::user();
        $bankDetail = BankDetail::where('user_id', $user->id)->first();
        $bank_name = "";
        $bank_account_name = "";
        $bank_account_number = "";
        if($bankDetail){
            $bank_name = $bankDetail->bank_name;
            $bank_account_name = $bankDetail->account_name;
            $bank_account_number = $bankDetail->account_number;
        }

        $user['bank_name'] = $bank_name;
        $user['bank_account_name'] = $bank_account_name;
        $user['bank_account_number'] = $bank_account_number;
        return $user;
    }
    /**
     * Update terms of trade
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function updateTerms(Request $request): array
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
     * @return array
     */
    public function updateBlurb(Request $request): array
    {
        $value = $request->input('value');
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

    public function updatePhone(Request $request): array
    {
        $user = Auth::user();
        $value = $request->input('no');
        if(strlen($value) >= 255)
            return ["error"=>"phone number(s) too long"];

        $user->phone = $value;
        $user->save();
        return [
            "success"=>"Updated",
            "phone"=>$value
        ];
    }

    public function updateName(Request $request): array
    {
        $user = Auth::user();
        $value = $request->input('name');

        if(strlen($value) >= 100)
            return ['error'=>"Name too long"];

        $user->username = $value;
        $user->save();
        return [
            "success"=>"Updated",
            "username"=>$value
        ];
    }

    public function updateEmail(Request $request): array
    {
        $user = Auth::user();
        $value = $request->input('email');

        if(strlen($value) >= 100)
            return ['error'=>"Email too long"];

        if(!filter_var($value,FILTER_VALIDATE_EMAIL))
            return ['error'=>"Invalid Email"];

        $exists = User::where([ ['email', $value], ['id', '<>', $user->id] ])->exists();

        if($exists)
            return ["error"=>"Email already belongs to another"];

        $user->email = $value;
        $user->save();
        return [
            "success"=>"Updated",
            "email"=>$value
        ];
    }

    public function updateBankDetails(Request $request) : array
    {
        $this->validate($request, [
            'bank_name'=>['required'],
            'account_name'=>['required'],
            'account_number'=>['required'],
        ]);

        $bank_name = $request->input('bank_name');
        $account_name = $request->input('account_name');
        $account_number = $request->input('account_number');

        if(strlen($bank_name) >= 50)
            return ['error'=>"Bank name too long"];

        if(strlen($account_name) >= 50)
            return ['error'=>"Account name too long"];

        if(strlen($account_number) >= 50)
            return ['error'=>"Account number too long"];

        $user = Auth::user();

        $bankDetail =  BankDetail::where('user_id', $user->id)->first();
        if(!$bankDetail)
            $bankDetail = new BankDetail();

        $bankDetail->user_id = $user->id;
        $bankDetail->bank_name = $bank_name;
        $bankDetail->account_name = $account_name;
        $bankDetail->account_number = $account_number;
        $bankDetail->save();
        return [
            "success"=>"Updated",
            "bank_name"=>$bank_name,
            "account_name"=>$account_name,
            "account_number"=>$account_number
        ];
    }

}
