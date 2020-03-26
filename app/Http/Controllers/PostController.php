<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tags;
use App\Label;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapost['datapost']=Post::all();
        return view('adminpage.postingan',$datapost);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $label=Label::all();
        $tags=Tags::all();    
        return view('adminpage.post.create',compact('label','tags'));

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     =>'required',
            'diskripsi' =>'required',
            'gambar'    =>'required|image|max:10000',
            'id_user'   =>'required',
            'id_tag'    =>'required',
            'id_label'  =>'required',
        ]);

        $image=$request->file('gambar');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('asset/imagepost'), $new_name);
        $form_post= array(
            'title'     => $request->title,
            'diskripsi' => $request->diskripsi,
            'gambar'    => $new_name,
            'id_user'   => $request->id_user,
            'id_tag'    => $request->id_tag,
            'id_label'  => $request->id_label,
        );

        Post::create($form_post);

       
        return redirect('postingan')->with('status','Postingan Berhasil Ditambahkan');
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
        $label=Label::all();
        $tags=Tags::all();  
        $datapost=Post::where('id',$id)->first();    
        return view('adminpage.post.editpost',compact('datapost','label','tags'));
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
        $image_name = $request->hidden_image;
        $image= $request->gambar;

        if($image !='')
        {
            $request->validate([
                'title'     =>'required',
                'diskripsi' =>'required',
                'id_tag'    =>'required',
                'id_label'  =>'required',
                'id_user'   =>'required',
                'gambar'    =>'max:10000'
            ]);

            $image_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('asset/imagepost'), $image_name);
        }

        else

        {
            $request->validate([
                'title'     =>'required',
                'diskripsi' =>'required',
                'id_tag'    =>'required',
                'id_label'  =>'required',
                'id_user'   =>'required'
            ]);
        }

        $form_data=array(
            'title'     => $request->title,
            'diskripsi' => $request->diskripsi,
            'id_user'   => $request->id_user,
            'id_label'  => $request->id_label,
            'id_tag'    => $request->id_tag,
            'gambar'    => $image_name
        );

        Post::whereId($id)->update($form_data);
        return redirect('postingan')->with('post', 'Data Berhasil Di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datapost=Post::where('id',$id)->first();
       
        unlink(public_path() .  '/asset/imagepost/' . $datapost->gambar );
        $datapost->delete();
        return redirect('postingan')->with('delete','Delete Postingan Berhasil Njing !');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
