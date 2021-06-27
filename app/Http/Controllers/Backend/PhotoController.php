<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Photo = Photo::orderBy('id','DESC')->paginate(5);
        return view('backend.photo.index',['Photo'=>$Photo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Photo = new Photo($request->all());

        if($request->hasFile('image')){
            $file_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($request->file('image')->move('upload/gallery',$file_name)){
                $Photo->image = $file_name;
            }
        }

        $Photo->saveOrFail();

        return redirect()->route('photo.index')->with('msg','تصویر با موفقیت ثبت شد');
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
        $Photo = Photo::findOrFail($id);
        return view('backend.photo.edit',compact('Photo'));
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
        $Photo = Photo::findOrFail($id);
        if($request->hasFile('image')){
            $file_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($request->file('image')->move('upload/gallery',$file_name)){
                $Photo->image = $file_name;
            }
        }
        $Photo->update($request->all());

        return redirect()->route('photo.index')->with('msg','تصویر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Photo = Photo::findOrFail($id);
        $image = $Photo->image;
        $Photo->delete();
        if(!empty($image)){
            unlink('upload/gallery',$image);
        }

        return redirect()->route('photo.index')->with('msg','تصویر با موفقیت حذف شد');
    }
}
