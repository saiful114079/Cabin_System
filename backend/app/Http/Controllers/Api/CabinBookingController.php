<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CabinBooking;
use Carbon\Carbon;

class CabinBookingController extends Controller
{








    /* ============ Cabin Booking Status ============== */

    public function index()
    {
        $data = CabinBooking::leftjoin('patient_lists', 'cabin_bookings.petient_id', '=', 'patient_lists.id')
            ->leftjoin('cabin_infos', 'cabin_bookings.cabin_no', '=', 'cabin_infos.cabin_no')
            ->leftjoin('doctor_lists', 'cabin_bookings.surgeon_id', '=', 'doctor_lists.id')
            ->select(
                'patient_lists.patient_id',
                'patient_lists.patient_name',
                'cabin_bookings.*',
                'cabin_infos.cabin_name',
                'cabin_infos.cabin_no',
                'doctor_lists.dr_name'
            )
            ->orderBy('booking_date','DESC')
            ->get();
        return response()->json(['data' => $data]);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'cabin_name' => 'required',
            'booking_date' => 'required',
            'shift_type' => 'required',
            'petient_id' => 'required',
            'surgeon_id' => 'required',
        ]);

        CabinBooking::insert([
            'booking_date' => $request->booking_date,
            'cabin_no' => $request->cabin_no,
            'shift_type' => $request->shift_type,
            'surgeon_id' => $request->surgeon_id,
            'petient_id' => $request->petient_id,
            'booking_staus' => 'booking',
            'operation_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CabinBooking::where('booking_id', $id)->first();
        return response()->json($data);
    }


    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'cabin_no' => 'required',
            'booking_date' => 'required',
            'shift_type' => 'required',
            'petient_id' => 'required',
            'surgeon_id' => 'required',
        ]);

        CabinBooking::where('booking_id', $id)->update([
            'booking_date' => $request->booking_date,
            'cabin_no' => $request->cabin_no,
            'shift_type' => $request->shift_type,
            'surgeon_id' => $request->surgeon_id,
            'petient_id' => $request->petient_id,
            'operation_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
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
