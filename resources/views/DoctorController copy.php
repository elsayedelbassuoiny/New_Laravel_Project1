<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use DB ;
use Illuminate\Support\Facades\Redirect;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors =Doctor::get();
        return view('doctors.index')->with('doctors',$doctors);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors= Doctor::get();
        return view('doctors.create',['doctors'=>$doctors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
     
        $isInsertSucess = DB::table('doctors')->insert(['name' => $name,'email'=>$email,'password'=>$password]);
        if ($isInsertSucess)   return Redirect::route('doctors.index') ;
        else  echo '<h3>fail</h3>' ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {

        return view('doctors.show',['doctors'=>$doctor]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit',['doctors'=>$doctor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
      

        $doctor->save();
        return Redirect::route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Doctor $doctor)
    {
        $doctor->delete();
        return Redirect()->route('doctors.index')->with('state','doctor deleted');
    }
}
