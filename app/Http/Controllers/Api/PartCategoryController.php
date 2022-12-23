<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartCategoryResource;
use App\Models\PartCategory;
use Illuminate\Http\Request;

class PartCategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = PartCategory::orderBy('nama', 'asc');

        if($request->has('part_category_id') && $request->part_category_id != '') {
            $data->where('id', $request->part_category_id);
        }

        if($request->has('nama') && $request->nama != '') {
            $data->where('nama', 'like', '%' . $request->nama . '%');
        }

        return ResponseFormatter::success((PartCategoryResource::collection($data->get())), 'OK');
    }
}
