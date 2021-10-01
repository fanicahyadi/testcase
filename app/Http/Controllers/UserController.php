<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $users = User::all();

        return view('user.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required'
        ]);
        $show = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password'])
        ]);

        return redirect('/users')->with('success', 'User is successfully saved');
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
        $users = User::findOrFail($id);

        return view('user.edit', compact('users'));

        $users = admin::find(Auth::user()->id);

        return view('backend.user.updatepassword',compact('users'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'password_confrim' => 'required_with:password|same:password'
        ]);

        $users = User::find($id);
        $hashedPassword = $users-> password;

        if (\Hash::check($request->oldpassword , $hashedPassword )) {
  
             if (!\Hash::check($request->newpassword , $hashedPassword)) {
     
                 $users->password = bcrypt($request->newpassword);
                 $users->save();

                 user::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
     
                 session()->flash('message','User password updated successfully updated');
                 return redirect()->back();
             }
     
                 else{
                     session()->flash('message','User new password can not be the old password!');
                     return redirect()->back();
                     }
         }
  
           else{
                session()->flash('message','User old password doesnt matched');
                return redirect()->back();
              }
    
        return redirect('/users')->with('success', 'User Data is successfully updated');

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/users')->with('success', 'User Data is successfully deleted');
    }

}
