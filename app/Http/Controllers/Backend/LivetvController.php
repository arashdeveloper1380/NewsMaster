<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Livetv;
use Illuminate\Http\Request;

class LivetvController extends Controller
{

    public function create()
    {
        $Livetv = Livetv::first();
        return view('backend.livetv.create',['Livetv'=>$Livetv]);
    }

    public function update(Request $request, $id)
    {
        $Livetv = Livetv::findOrFail($id);
        $Livetv->update($request->all());

        return redirect()->back();
    }
}
