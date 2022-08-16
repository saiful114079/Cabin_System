<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CabinInfo;
use Carbon\Carbon;

class CabinInfoController extends Controller
{

    public function cabinListWithBooking()
    {
    }

    /* ============ Cabin Booking Status ============== */
    // public function cabinBookingStatus(Request $request)
    // {

    //     if ($request->booking_date != NULL) {
    //         $data = CabinInfo::with(['booking', 'booking.patient'])->get();
    //         return response()->json(['data' => $data]);
    //     } else {
    //     }



    //     if ($request->booking_date != NULL) {
    //         $data = CabinBooking::where('booking_date', $request->booking_date)->get();
    //         return response()->json($data);
    //     } else {
    //         $current_date = Carbon::now()->format('Y-m-d');
    //         $data = CabinBooking::where('booking_date', $current_date)->get();
    //         return response()->json($data);
    //     }
    // }

    public function availableCabin(Request $request){
        $date = $request->booking_date;
        $data = CabinInfo::with([
            'booking' => function ($query) use ($date) {
                $query->where('booking_date',$date);
            },
            'booking.patient'
            ])
            ->get();
        return response()->json(['data' => $data]);
    }

    public function index()
    {
        $data = CabinInfo::with('booking')->get();
        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        $validateData = $request->validate([
            'cabin_no' => 'required|numeric|min:1|max:12|unique:cabin_infos,cabin_no',
            'cabin_name' => 'required|max:10|unique:cabin_infos,cabin_name',
            // 'cabin_description'
        ]);

        CabinInfo::insert([
            'cabin_no' => $request->cabin_no,
            'cabin_name' => $request->cabin_name,
            'cabin_description' => $request->cabin_description,
            'created_at' => Carbon::now(),
        ]);
    }

    public function show($id)
    {
        $data = CabinInfo::where('cabin_no', $id)->first();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'cabin_no' => 'required|numeric|min:1|max:12|unique:cabin_infos,cabin_no,' . $id . ',cabin_no',
            'cabin_name' => 'required|unique:cabin_infos,cabin_name,' . $id . ',cabin_no',


            // 'cabin_description'
        ]);

        CabinInfo::where('cabin_no', $id)->update([
            'cabin_no' => $request->cabin_no,
            'cabin_name' => $request->cabin_name,
            'cabin_description' => $request->cabin_description,
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}