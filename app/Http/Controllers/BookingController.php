<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = Booking::query();

            return DataTables::eloquent($query)
                                ->addColumn('action', function (Booking $booking) {
                                    return '<a href="' . route('booking.edit', $booking->id) . '" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
                                            <button class="btn btn-danger btn-sm btn_delete" data-id="' . $booking->id . '"><i class="bx bx-trash"></i></button>';
                                })
                                ->rawColumns(['action'])
                                ->toJson();
        }

        return view('pages.booking.index');
    }
}
