<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{

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
        $User = User::orderBy('id','DESC')->paginate(5);
        return view('backend.role.index',compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $User = new User($request->all());

        $User->type = 0;
        $User->category = $request->category;
        $User->subcategory = $request->subcategory;
        $User->district = $request->district;
        $User->subdistrict = $request->subdistrict;
        $User->post = $request->post;
        $User->social = $request->social;
        $User->prayer = $request->prayer;
        $User->livetv = $request->livetv;
        $User->notice = $request->notice;
        $User->gallery = $request->gallery;
        $User->role = $request->role;
        $User->password = Hash::make($request->password);
        $User->saveOrFail();

        return redirect()->route('writer.index')->with('msg','کاربر با موفقیت ثبت شد');
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
        $User = User::findOrFail($id);

        return view('backend.role.edit',['User'=>$User]);
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
        $User = User::findOrFail($id);

        $User->name = $request->name;
        $User->email = $request->email;
        $User->type = 0;
        $User->category = $request->category;
        $User->subcategory = $request->subcategory;
        $User->district = $request->district;
        $User->subdistrict = $request->subdistrict;
        $User->post = $request->post;
        $User->social = $request->social;
        $User->prayer = $request->prayer;
        $User->livetv = $request->livetv;
        $User->notice = $request->notice;
        $User->gallery = $request->gallery;
        $User->role = $request->role;
        $User->update();

        return redirect()->route('writer.index')->with('msg','کاربر با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('writer.index')->with('msg','کاربر با موفقیت حذف شد');
    }
}
