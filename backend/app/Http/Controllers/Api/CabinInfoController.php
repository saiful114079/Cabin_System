<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CabinInfo;
use Carbon\Carbon;

class CabinInfoController extends Controller
{

    public function index()
    {
        $data = CabinInfo::get();
        return response()->json( ['data' => $data] );
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
            'cabin_no' => 'required|max:10|unique:cabin_infos,cabin_no',
            'cabin_name' => 'required|max:10|unique:cabin_infos,cabin_name',


            // 'cabin_description'
        ]);

        CabinInfo::insert([
            'cabin_no' => $request->cabin_no,
            'cabin_name' => $request->cabin_name,
            'cabin_description' => $request->cabin_description,
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
        //
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
