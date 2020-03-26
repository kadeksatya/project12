<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Label;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalabel=Label::all();
        return view('adminpage.label',compact('datalabel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.label.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data=array(
            'label' => $request->label,
        );

        Label::create($form_data);
        return redirect('label')->with('create','Data Berhasil Ditambahkan!');
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
        $datalabel=Label::whereId($id)->first();
        return view('adminpage.label.edit', compact('datalabel'));
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
        $form_data= array(
            'label' => $request->label
        );

        Label::whereId($id)->update($form_data);
        return redirect('label')->with('update','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Label::whereId($id)->delete();
        return redirect('label')->with('delete','Data Berhasil Di Delete');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
