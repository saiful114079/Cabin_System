<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorList;

class DoctorController extends Controller
{
    public function getSomeDoctorList(){
        $data = DoctorList::select('dr_id','id','dr_name')->get();
        return response()->json($data);
    }

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
