<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Rules\EmailRule;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    use ApiResponseTrait;
//    public function index(Request $request)
//    {
//        return Category::find($request->id);
//    }

    public function index()
    {
        return 'test';
    }

    public function index1(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name'      => 'required|min:5',
            'email'     => ['required',new EmailRule()],
            'password'  => 'required|min:8'
        ]);

        if ($validation->fails()){
            return $this->apiResponse(400,'Failed',$validation->errors());
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return $this->login();
    }

    public function userAccount()
    {
        $user = Auth::user();
        return $this->apiResponse(200,'User Info',null,$user);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->apiResponse(401,'Not Found');
        }

        return $this->respondWithToken($token);
    }


    protected function respondWithToken($token)
    {
        $arr =[
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];

        return $this->apiResponse(200,'login',null,$arr);
    }
}
