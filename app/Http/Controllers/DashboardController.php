<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use redirect;
use DB;
use Session;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depts=DB::table('DepartmentsAndHeads')->select('Department_Name','Department_Head')->get();
        // print_r($depts);
        // $text="hi";
        // echo $text;
        return view('dashboard')->with('dept',$depts);
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
            'Department_Name'=>$request->dname,
            'Department_Head'=>$request->dhname
        );
        $flag=DB::table('DepartmentsAndHeads')->insert($formData);
            if($flag==1){
            Session::flash('flash_message', 'Department Created Sucessfully');
            $message="Department successfully created";
           return redirect('/dash')->with('message',$message);
        }
        else{
           $message="Error Occured";
          return view('/dash')->with('message',$message);
        }
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
    public function test(){

    }
}
