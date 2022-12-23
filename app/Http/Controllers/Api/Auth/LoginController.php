<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'        => 'required',
            'password'    => 'required',
        ]);

        if($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), 'Login Gagal', 201);
        }

        if (auth()->attempt($request->only('email', 'password'))) {
            $user = auth()->user();

            $token = $user->createToken('booking_service');
            $user->token = $token->plainTextToken;

            return ResponseFormatter::success((new UserResource($user)), 'OK');
        }

        return ResponseFormatter::error([], 'Your credential does not match.', 401);
    }
}
