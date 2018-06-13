<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;

class StudentsController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

       return view('components.content')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $mid_name = $request->input('mid_name');
        $sex = $request->input('sex');
        $dob = $request->input('dob');
        $address = $request->input('address');

        $data = array('first_name'=>$first_name,
                      'last_name'=>$last_name,
                      'mid_name'=>$mid_name,
                      'sex'=>$sex,
                      'dob'=>$dob,
                      'address'=>$address);
        DB::table('students')->insert($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
    //        $students = Student::find($id);   
    //        return view('/')->with('students', $students);
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
       $students = Student::findOrFail($request->id);

       $students->update($request->all());
       return back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $students = Student::find($id);
       $students->delete();
        return redirect('/');
    }
}
