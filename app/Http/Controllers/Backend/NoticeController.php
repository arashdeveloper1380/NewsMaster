<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    
    public function create()
    {
        $Notice = Notice::first();
        return view('backend.notice.create',['Notice'=>$Notice]);
    }

    public function update(Request $request, $id)
    {
        $Notice = Notice::findOrFail($id);
        $Notice->update($request->all());

        return redirect()->back();
    }

}
