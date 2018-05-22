<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userMail=Auth::user()->email;
        //echo $userMail;
        $userData=DB::Table('users')->select('name','email','role','password')->where('email',$userMail)->get()->toArray();
        $addData=DB::Table('Members')->select('LastName','DOJ','Contact_Number')->where('email',$userMail)->get()->toArray();
        return view('MyProfile',compact('userData','addData'));
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

        //     'Name'=>$request->name,
        //     'Designation'=>$request->Designation,
             $email=$request->email;
             $doj=$request->doj;
              $lname=$request->lname;
            $Contact_No=$request->Contact_No;
                $update_flg=DB::table('Members')
                            ->where('email', $email)
                            ->update([
                                'LastName'=>$lname,
                              'DOJ' => $doj,
                              'Contact_Number' => $Contact_No
                            ]);
                            if($flag==1){
                        Session::flash('flash_message', 'Profile Updated Sucessfully');
                        }else{
                        Session::flash('flash_message', 'Profile Updateion Failed');
                        }
                            return redirect('/MyProfile');
        // echo $upadte_flg;
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
        // $test="hai";
        // echo $test;
        // $formData=array(
        //     'Name'=>$request->name,
        //     'Designation'=>$request->Designation,
        //     'Email'=>$request->email,
        //     'Date_Of_Joining'=>$request->doj
        // );
        // print_r($formData);
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
    public function saveprofiledata(Request $request)
    {
        // $request->validate(['avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        // $user = Auth::user();
        // $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        // $request->avatar->storeAs('avatars',$avatarName);
        // $user->avatar = $avatarName;
        // $user->save();

        $user = Auth::user();
        $file = $request->file('avatar');
        $extension = $file->getClientOriginalExtension();
        $avatarName = $user->id.'_avatar'.time().'.'.$extension;
        $user->avatar = $avatarName;
        $destinationpath ='app/public/'.$avatarName;
        $uploaded=Storage::put($destinationpath,file_get_contents($file->getRealPath()));
        $user->save();

    }
}
