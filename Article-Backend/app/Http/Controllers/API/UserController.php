<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userlogin(Request $request)
    {
        $input = $request->all();
        $validation = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->all()], 422);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $tokenResult = $user->createToken('Personal Access Token');

            return response([
                'token' => $tokenResult->accessToken,
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ], 200);
        } else {
            return response([
                "message" => "Unauthorised."
            ], 401);
        }
    }


    public function me(Request $request)
    {
        $user = Auth::guard('api')->user();
        return response()->json(['data' => $user]);
    }

}