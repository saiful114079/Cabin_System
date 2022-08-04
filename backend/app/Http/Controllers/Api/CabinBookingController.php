<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CabinBooking;
use Carbon\Carbon;

class CabinBookingController extends Controller
{

    public function index()
    {
        $data = CabinBooking::with('cabin')->orderBy('booking_id','DESC')->get();
        return response()->json([ 'data' => $data ]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'cabin_no' => 'required',
            'booking_date' => 'required',
            'shift_type' => 'required',
        ]);

        CabinBooking::insert([
            'booking_date' => $request->booking_date,
            'cabin_no' => $request->cabin_no,
            'shift_type' => $request->shift_type,
            'surgeon_id' => 1,
            'petient_id' => 1,
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
        $data = CabinBooking::where('booking_id',$id)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
