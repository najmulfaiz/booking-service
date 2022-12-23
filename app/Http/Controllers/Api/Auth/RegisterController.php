<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
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
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|email|max:255|unique:users',
            'password'    => 'required|min:8',
            'no_hp'       => 'required|string|min:8|max:15',
            'alamat'      => 'required|string|max:255',
            'province_id' => 'required|string|exists:provinces,id',
            'regency_id'  => 'required|string|exists:regencies,id',
        ]);

        if($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), 'Registrasi Gagal', 201);
        }

        $user = new User;
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->password    = Hash::make($request->password);
        $user->no_hp       = $request->no_hp;
        $user->alamat      = $request->alamat;
        $user->province_id = $request->province_id;
        $user->regency_id  = $request->regency_id;

        if(!$user->save()) {
            return ResponseFormatter::error([], 'Registrasi Gagal', 201);
        }

        $token = $user->createToken('booking_service');
        $user->token = $token->plainTextToken;

        return ResponseFormatter::success((new UserResource($user)), 'OK');
    }
}
