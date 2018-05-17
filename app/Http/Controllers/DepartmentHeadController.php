<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DepartmentHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $count =DB::table('users')->groupBy('role')->count('role');
            $count =DB::select('SELECT COUNT(role) as cnt ,role from users GROUP BY role');
        //print_r($count);
        //$RAs=DB::table('Members')->select('Name','Email', 'Date_Of_Joining')->where('Designation',"RA")->get();
            $RAs=DB::table('Members')->select('Name','Email', 'Date_Of_Joining')->get();

        $RFs=DB::table('Members')->select('Name','Email', 'Date_Of_Joining')->where('Designation',"RF")->get();
        $IOs=DB::table('Members')->select('Name','Email', 'Date_Of_Joining')->where('Designation','IO')->get();
        //print_r($IOs);
        return view('DepartmentHead',compact('RAs','RFs','IOs','count'));
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
        $formData=array(
            'Name'=>$request->name,
            'Designation'=>$request->Designation,
            'Email'=>$request->email,
            'Sex'=>$request->Sex,
            'Date_Of_Joining'=>$request->doj
        );
        $desg=$request->Designation;
        //echo $desg;
        //print_r($fromData);
        $flag=DB::table('Members')->insert($formData);
        return redirect('/DepartmentHead');
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
