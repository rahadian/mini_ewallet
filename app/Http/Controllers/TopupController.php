<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topup;
use App\TopupHistory;
use Auth;
use Session;

class TopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $find = Topup::where ('user_id',Auth::user()->id)
                    ->first();
        if(empty($find)){
            $data = new Topup;
            $data->user_id = Auth::user()->id;
            $data->balance = $request->balance;
            $data->balance_achieve = $request->balance;



            Session::put('achieve_ses',$data->balance_achieve);
            // Session::put('topup_id',$data->id);

        }else{
            $data = Topup::where('user_id',Auth::user()->id)
                        ->first();
            $data->user_id = $data->user_id;
            $data->balance = $request->balance;
            $achieve = Topup::where('user_id',Auth::user()->id)
                            ->first();

            $data->balance_achieve = $data->balance_achieve + $request->balance;

        }
        $data->save();
        $zzz = Topup::select('user_balance.id as blnce_id','user_balance.*','user.*')
                    ->leftJoin('user','user.id','=','user_balance.user_id')
                    ->where('user_id',Auth::user()->id)
                    ->first();
        $datatopup = Topup::leftJoin('user_balance_history as b','b.user_balance_id','user_balance.id')
        ->where('user_id',Auth::user()->id)
        ->first();


        $data2 = new TopupHistory;

        $data2->user_balance_id = $zzz->blnce_id;
        $data2->balance_before = $datatopup->balance_achieve - $datatopup->balance;
        $data2->balance_after = $datatopup->balance_achieve;
        $data2->activity = $request->activity;
        $data2->type = $request->type;
        $data2->ip = $_SERVER['REMOTE_ADDR'];
        $data2->location = $request->location;
        $data2->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $data2->author = $zzz->username;
        // $data2->save();
        if($data2->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }else{
            $res['message']="Failed";
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
    public function update(Request $request, $user_id)
    {

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
