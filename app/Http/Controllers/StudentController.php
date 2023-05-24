<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB ;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students =Student::get();
        return view('students.index')->with('students',$students);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students= Student::get();
        return view('students.create',['students'=>$students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $level =$request->input('level');
        $acadimic_number =$request->input('acadimic_number');

    
        $isInsertSucess = DB::table('students')->insert(['name' => $name,'email'=>$email,'password'=>$password,'level'=>$level,'acadimic_number'=>$acadimic_number]);
        if ($isInsertSucess)   return Redirect::route('students.index') ;
        else  echo '<h3>fail</h3>' ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {

        return view('students.show',['students'=>$student]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit',['students'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $level =$request->input('level');
        $acadimic_number =$request->input('acadimic_number');

        $student->save();
        return Redirect::route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Student $student)
    {
        $student->delete();
        return Redirect()->route('students.index')->with('state','Student deleted');
    }
}
