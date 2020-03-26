<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tags;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatag=Tags::all();
        return view('adminpage.tag',compact('datatag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $form_tag= array(
            'tag' => $request->tags,
        );

        Tags::create($form_tag);

        return redirect('tags')->with('create','Data tag berhasil ditambahkan !');
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
       $datatag = Tags::where('id', $id)->first();
        return view('adminpage.tag.edit', compact('datatag'));
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
        $data_form= array(
            'tag'=>$request->tags
        );

        Tags::whereId($id)->update($data_form);

        return redirect('tags')->with('update','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tags::whereId($id)->delete();

        return redirect('tags')->with('delete','Data Berhasil di Delete');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
