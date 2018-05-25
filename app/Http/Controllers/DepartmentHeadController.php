<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
class DepartmentHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user()->name;
        //echo $user;
        $count =DB::select('SELECT COUNT(Designation) as cnt ,Designation from Members GROUP BY Designation');
        $RAs=DB::table('Members')->select('Id','Name','Email', 'DOJ')->where('Designation',"RA")->where('DeleteFlag','0')->get();
        $RFs=DB::table('Members')->select('Id','Name','Email', 'DOJ')->where('Designation',"RF")->where('DeleteFlag','0')->get();
        $IOs=DB::table('Members')->select('Id','Name','Email', 'DOJ')->where('Designation','IO')->where('DeleteFlag','0')->get();
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
        $user=Auth::user()->name;
        //echo $user;
        $department=DB::table('DepartmentsAndHeads')
        ->where('Department_Head',$user)
        ->value('Department_Name');
        $formData=array(
            'Name'=>$request->name,
            'Designation'=>$request->Designation,
            'Email'=>$request->email,
            'Sex'=>$request->Sex,
            'DOJ'=>$request->doj,
            'Department'=>$department
        );
        //$desg=$request->Designation;
        //echo $desg;
        print_r($formData);
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
        $update_flg=DB::table('Members')
                    ->where('Id', $id)
                    ->update([
                       'DeleteFlag'=>'1'
                    ]);
                    return redirect('/DepartmentHead');
       }


    public function Updaterow(Request $request)
    {
            $Name=$request->name;
            $Email=$request->email;
            $DOJ=$request->doj;
        $update_flg=DB::table('Members')
                    ->where('email', $Email)
                    ->update([
                      'Name'=>$Name,
                      'DOJ' => $DOJ,
                      'email'=>$Email
                    ]);
                    if($update_flg==1){
                Session::flash('flash_message', 'Profile Updated Sucessfully');
                }else{
                Session::flash('flash_message', 'Profile Updation Failed');
                }
                    return redirect('/DepartmentHead');
    }

}
