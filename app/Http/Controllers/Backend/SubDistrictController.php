<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubDistrictRequest;
use App\Models\District;
use App\Models\SubDistrict;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SubDistrict = SubDistrict::orderBy('id','DESC')->paginate(5);
        return view('backend.subdistrict.index',compact('SubDistrict'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $District = District::all();
        return view('backend.subdistrict.create',compact('District'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubDistrictRequest $request)
    {
        $SubDistrict = new SubDistrict($request->all());
        $SubDistrict->saveOrFail();

        return redirect()->route('subdistrict.index')->with('msg','شهر با موفقیت ثبت شد');
        
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
        $District = District::all();
        $SubDistrict = SubDistrict::findOrFail($id);

        return view('backend.subdistrict.edit',compact('District','SubDistrict'));
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
        $SubDistrict = SubDistrict::findOrFail($id);
        $SubDistrict->update($request->all());

        return redirect()->route('subdistrict.index')->with('msg','شهر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubDistrict::findOrFail($id)->delete();
    }
}
