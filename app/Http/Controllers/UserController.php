<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserWallet;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserWallet::all();
        return response()->json($users, 200);
    }

    public function indexAuth() {
        $first = "Welcome " . Auth::user()->name;
        $users = UserWallet::all();
        return response()->json($users, 200);
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
        $user = new UserWallet;
        // $user->username = Input::get('username');
        $user->username = $request->username;
        // $user->email = Input::get('email');
        $user->email = $request->email;
        // $user->password = \Hash::make(Input::get('password'));
        $user->password = \Hash::make($request->password);
        if($user->save()){
            $res['message'] = "Success!";
            $res['value'] = "$user";
            return response($res);
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
        $user = UserWallet::find($id);
        if(is_null($user)){
            return response()->json("Data not found", 404);
        }else{
            $res['message']='Success';
            $res['values']=$user;
            return response($res);
        }
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
        $user = UserWallet::find($id);
        if(!is_null($request->username)){
        $user->username = $request->username;
        }
        if(!is_null($request->email)){
        $user->email = $request->email;
        }
        if(!is_null($request->password)){
        // $user->password = \Hash::make(Input::get('password'));
        $user->password = \Hash::make($request->password);
        }
        if($user->save()){
            $res['message']="Success";
            $res['value']="$user";
            return response($res);
        }else{
            $res['message']="Failed";
            return response($res);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UserWallet::find($id);
        if($user->delete()){
            $res['message']="Success";
            $res['value'] = "$user";
            return response($res);
        }else{
            $res['message']="Failed";
            return response($res);
        }
    }
}
