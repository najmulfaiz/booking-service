<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class ReferensiController extends Controller
{
    public function provinces(Request $request)
    {
        $data = Province::orderBy('name', 'asc');

        if($request->has('province_id') && $request->province_id != '') {
            $data->where('id', $request->province_id);
        }

        if($request->has('name') && $request->name != '') {
            $data->where('name', 'like', '%' . $request->name . '%');
        }

        return ResponseFormatter::success($data->get(), 'OK');
    }

    public function regencies(Request $request)
    {
        $data = Regency::orderBy('name', 'asc');

        if($request->has('province_id') && $request->province_id != '') {
            $data->where('province_id', $request->province_id);
        }

        if($request->has('regency_id') && $request->regency_id != '') {
            $data->where('id', $request->regency_id);
        }

        if($request->has('name') && $request->name != '') {
            $data->where('name', 'like', '%' . $request->name . '%');
        }

        return ResponseFormatter::success($data->get(), 'OK');
    }
}
