<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientList;

class PatientController extends Controller
{

    public function getPatientSomeData(){
        $data = PatientList::select('id','patient_id','patient_name')->get();
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
