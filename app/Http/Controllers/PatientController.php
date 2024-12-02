<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = new Patient;
        if(request()->has("toGet"))
            return $model->paginate(request()->toGet);
        else
        {
            return $model::all();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $patient = new Patient();
        $patient -> sex = request()-> sex;
        $patient -> name = request()-> name;
        $patient -> avatar = request()-> avatar;
        $patient -> surname = request()-> surname;
        $patient -> date_of_birth = request()-> date_of_birth;
        $patient -> phone = request() -> phone ;
        $patient -> CIN = request() -> CIN ;
        $patient -> diabetes = request() -> diabetes ;
        $patient -> blood_type = request() -> blood_type ;
        $patient -> coverage = request() -> coverage ;
        $patient -> coverage_type = request() -> coverage_type ;
		$patient -> coverage_number = request() -> coverage_number ;
        $patient -> save();

        $patient -> uid = "P".date("Y")."-".str_pad($patient->id, 6, '0', STR_PAD_LEFT);;
        $patient -> save();

        return $patient;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Patient::where("uid","=",$id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patient::find($id);
        $patient -> sex = request()-> sex;
        $patient -> name = request()-> name;
        $patient -> avatar = request()-> avatar;
        $patient -> surname = request()-> surname;
        $patient -> date_of_birth = request()-> date_of_birth;
        $patient -> phone = request() -> phone ;
        $patient -> CIN = request() -> CIN ;
        $patient -> diabetes = request() -> diabetes ;
        $patient -> blood_type = request() -> blood_type ;
        $patient -> coverage = request() -> coverage ;
        $patient -> coverage_type = request() -> coverage_type ;
		$patient -> coverage_number = request() -> coverage_number ;
        $patient -> observation = request() -> observation ;
        $patient -> save();

        return ["message"=>"Modifié avec succès"];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(string $filter)
    {

        return Patient::where("CIN","LIKE",$filter."%")->orWhere("phone","LIKE",$filter."%")->get()->take(3);
    }
}
