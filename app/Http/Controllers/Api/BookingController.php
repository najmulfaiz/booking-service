<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $data = Booking::orderBy('tanggal', 'desc');

        if($request->has('booking_id') && $request->booking_id != '') {
            $data->where('id', $request->booking_id);
        }

        if($request->has('user_id') && $request->user_id != '') {
            $data->where('user_id', $request->user_id);
        }

        if($request->has('jenis_kendaraan_id') && $request->jenis_kendaraan_id != '') {
            $data->where('jenis_kendaraan_id', $request->jenis_kendaraan_id);
        }

        if($request->has('jenis_transmisi_id') && $request->jenis_transmisi_id != '') {
            $data->where('jenis_transmisi_id', $request->jenis_transmisi_id);
        }

        if($request->has('nama') && $request->nama != '') {
            $data->where('nama', 'like', '%' . $request->nama . '%');
        }

        return ResponseFormatter::success((BookingResource::collection($data->get())), 'OK');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal'            => 'required|date',
            'nopol'              => 'required|string|max:255',
            'jenis_kendaraan_id' => 'required|string|exists:jenis_kendaraans,id',
            'jenis_transmisi_id' => 'required|string|exists:jenis_transmisis,id',
            'tahun'              => 'required|string|max:4',
            'bahan_bakar'        => 'required|string|max:255',
            'keluhan'            => 'required|string',
        ]);

        if($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), 'Data booking gagal disimpan', 201);
        }

        $booking = new Booking;
        $booking->tanggal            = $request->tanggal;
        $booking->user_id            = $request->user()->id;
        $booking->nopol              = $request->nopol;
        $booking->jenis_kendaraan_id = $request->jenis_kendaraan_id;
        $booking->jenis_transmisi_id = $request->jenis_transmisi_id;
        $booking->tahun              = $request->tahun;
        $booking->bahan_bakar        = $request->bahan_bakar;
        $booking->keluhan            = $request->keluhan;

        if(!$booking->save()) {
            return ResponseFormatter::error([], 'Data booking gagal disimpan', 201);
        }

        return ResponseFormatter::success((new BookingResource($booking)), 'OK');
    }

    public function show($booking_id)
    {
        $booking = Booking::find($booking_id);

        if(!$booking) {
            return ResponseFormatter::success([], 'Data tidak ditemukan', 201);
        }

        return ResponseFormatter::success((new BookingResource($booking)), 'OK');
    }
}
