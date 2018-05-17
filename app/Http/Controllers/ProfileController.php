<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

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
        //echo ($userData);
        return view('MyProfile')->with('userData',$userData);
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
            'Date_Of_Joining'=>$request->doj,
            'Contact_Number'=>$request->Contact_No
        );
        $doj=$request->doj;
        print_r($formData);
        //$flag=DB::Table('Member')->insert('Date_Of_Joining',$doj);
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = Auth::user();
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatars',$avatarName);
        $user->avatar = $avatarName;
        $user->save();
         Session::flash('flash_message', 'User profile Updated');
                $update_flg=DB::table('Members')
                            ->where('email', $formData['email'])
                            ->update([
                              ' Date_Of_Joining' => $formData['doj'],
                              'Contact_No' => $formData['Contact_No']
                            ]);
        return redirect('/MyProfile');

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
}
