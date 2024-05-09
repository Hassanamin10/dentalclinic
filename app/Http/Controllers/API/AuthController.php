<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateJWT_Token;
use App\Http\Traits\ApiHandler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function welcome(){
            
        return response()->json(['name'=>'Hassan Sabry']);
    }
    public function login(Request $request)
    {
        try{
        $rules= [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $data = Validator::make($request->all(),$rules);

        if ($data->fails()){
            $code = $this->returnCodeAccordingToInput($data);
            return $this->returnValidationError($data,$code);
        }

        $credentials = $request->only(['email','password']);
            $token = Auth::guard('api')->attempt($credentials);
            if(!$token)
            {
                return response()->json(['msg' => "Not Found"]);
            }
            $user = Auth::guard('api')->user();
            $user->token = $token;
            return response()->json(['msg' => "$user"]);
    }catch(\Exception $e){
        $this->returnError($e->getCode(),$e->getMessage());
    }
    return response()->json(['msg' => "Error"]);
} 

}
