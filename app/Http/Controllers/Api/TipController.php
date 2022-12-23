<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\TipResource;
use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index(Request $request)
    {
        $data = Tip::orderBy('created_at', 'desc');

        if($request->has('tip_id') && $request->tip_id != '') {
            $data->where('id', $request->tip_id);
        }

        if($request->has('title') && $request->title != '') {
            $data->where('title', 'like', '%' . $request->title . '%');
        }

        return ResponseFormatter::success((TipResource::collection($data->get())), 'OK');
    }
}
