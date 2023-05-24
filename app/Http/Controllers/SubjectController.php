<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Subject;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Student;
use App\Models\Doctor;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub= Subject::all();
        return view('subjects.index')->with('sub',$sub);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departmets= Department::get();
        $subjects=Subject::get();
        $doctors=Doctor::get();
        return view('subjects.create',['departmets'=>$departmets,"subjects"=>$subjects , "doctors"=>$doctors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $code = $request->input('code');
        $dep = $request->input('dep');
        $pre = $request->input('pre');
        $doc = $request->input('doc');
        $isInsertSucess = DB::table('subjects')->insert(['name' => $name,'code'=>$code,'department_Id'=>$dep,'pre_requisite'=>$pre , 'doctor_id'=>$doc]);
        if ($isInsertSucess)   return Redirect::route('subjects.index') ;
        else  echo '<h3>fail</h3>' ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject=Subject::where('id','=',$id)->with('department')->first();
        return view('subjects.show',['subject' => $subject]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $departmets= Department::get();
        $subjects=Subject::get();
        $doctors=Doctor::get();
        return view('subjects.edit',['departmets'=>$departmets,'subject' => $subject,'subjects' => $subjects,'doctors'=>$doctors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $name = $request->input('name');
        $code = $request->input('code');
        $dep = $request->input('dep');
        $pre = $request->input('pre');
        $doc = $request->input('doc');

        $user = Subject::find($id);
        $user->name = $name;
        $user->code = $code;
        $user->department_Id = $dep;
        $user->pre_requisite = $pre;
        $user->doctor_id = $doc;
        $user->save();
        return Redirect::route('subjects.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return Redirect::route('subjects.index');

    }



    

   
}
