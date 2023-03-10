<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Session;

class AuthController extends Controller
{
    use GeneralTrait;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function login(Request $request)
    {
        try {
            $rules = [
                "email" => "required|email",
                "password" => "required"
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            $credentials = $request->only(['email', 'password']);

            if(Auth::guard('admin-api')->attempt($credentials))
            {

                $student = Auth::guard('admin-api')->user();
               
                $token = $student->createToken('MyApp', ['admin-api'])->plainTextToken;

                if (!$token)
                    return $this->returnError('E001', 'The login information is incorrect');

                $student->api_token = $token;
                
               //return $this->returnData('admin', $student);
               $request->session()->put('token',$token);
               
               return redirect('admin/dashboard');

            }
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

        return $this->returnError('E001', 'The login information is incorrect');
      
    }
    public function dashboard(){
        
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return $this->returnSuccessMessage('Logged out successfully');
        // $token = $request->header('auth-token');
        // if ($token) {
        //     try {

        //         JWTAuth::setToken($token)->invalidate(); 
        //     } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        //         return  $this->returnError('', 'some thing went wrongs');
        //     }
        //     return $this->returnSuccessMessage('Logged out successfully');
        // } else {
        //     $this->returnError('', 'some thing went wrongs');
        // }
    }
}
