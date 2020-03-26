<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\User;

class SettingUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpage.dashboard');
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
        //
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
        $datauser=User::whereId($id)->first();
        return view('adminpage.user.setting',compact('datauser'));
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
        $image_name = $request->hidden_photo;
        $image= $request->photo;

        if($image !='')
        {
            $request->validate([
                'name'      =>'required',
                'username'  =>'required',
                'photo'    =>'max:10000'
            ]);

            $image_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('asset/imageuser'), $image_name);
        }

        else

        {
            $request->validate([
                'name'     => 'required',
                'username' =>'required'
            ]);
        }

        $form_data=array(
            'name'      => $request->name,
            'username'  => $request->username,
            'photo'     => $image_name
        );

        User::whereId($id)->update($form_data);
        return redirect('setting')->with('post', 'Data Berhasil Di Update !');
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
