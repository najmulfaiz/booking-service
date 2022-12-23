<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartResource;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartController extends Controller
{
    public function index(Request $request)
    {
        $data = Part::orderBy('nama', 'asc');

        if($request->has('part_id') && $request->part_id != '') {
            $data->where('id', $request->part_id);
        }

        if($request->has('part_category_id') && $request->part_category_id != '') {
            $data->where('part_category_id', $request->part_category_id);
        }

        if($request->has('nama') && $request->nama != '') {
            $data->where('nama', 'like', '%' . $request->nama . '%');
        }

        return ResponseFormatter::success((PartResource::collection($data->get())), 'OK');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'             => 'required|string|max:255',
            'harga'            => 'required|string|max:255',
            'image'            => 'required|image|max:1024',
            'part_category_id' => 'required|string|exists:part_categories,id',
        ]);

        if($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), 'Data part gagal disimpan', 201);
        }

        $part = new Part;
        $part->nama             = $request->nama;
        $part->harga            = $request->harga;
        $part->image            = $request->file('image')->store('public/images');
        $part->part_category_id = $request->part_category_id;

        if(!$part->save()) {
            return ResponseFormatter::error([], 'Data part gagal disimpan', 201);
        }

        return ResponseFormatter::success((new PartResource($part)), 'OK');
    }

    public function show($part_id)
    {
        $part = Part::find($part_id);

        if(!$part) {
            return ResponseFormatter::success([], 'Data tidak ditemukan', 201);
        }

        return ResponseFormatter::success((new PartResource($part)), 'OK');
    }
}
