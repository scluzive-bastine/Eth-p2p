<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use \Benji\Ethereum\AddressValidator;

class SignInController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('signUserOut');
    }
    /**
     * Generate Nounce for user login
     * @return array
    */
    public function getNounce(Request $request) : array
    {
        if(!$request->ajax())return [];

        $this->validate($request, [
            'address'=>'required'
        ]);
        $nonAddress = "0x0000000000000000000000000000000000000000";
        $address = $request->input('address');

        if($address == $nonAddress)return [];
        if(AddressValidator::isValid($address) === AddressValidator::ADDRESS_INVALID)return [];

        $user = User::where('address', $address)->first();

        if(!$user){
            $user = User::create([
                'address'=>$address,
                'nounce'=>generateNounce()
            ]);
        }
        return [
            'nounce'=>$user->nounce,
        ];
    }
    /**
     * Sign user in
     * @return array
    */    
    public function signUserIn(Request $request) : array
    {
        $this->validate($request, [
            'address'=>'required',
            'signature'=>'required',
            'message'=>'required',
            'nounce'=>'required'
        ]);    
        
        $address = $request->input('address');  
        $signature = $request->input('signature');
        $message =  $request->input('message');
        $nounce = $request->input('nounce');

        $user = User::where([ 
            ['address', $address],
            ['nounce', $nounce]
        ])->first();
        
        if($user){
            if( verifySignature($message, $signature, $address) ){
                Auth::login($user);
                $user->nounce = generateNounce();
                $user->save();
                return ['signed'=>true];
            }
        }
        return ['error'=>"Invalid user"];
    }
    /**
     * Sign user out
     * @return array
    */
    public function signUserOut(Request $request)  :bool
    {
        Auth::logout();
        return true;
    }

}
