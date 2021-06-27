<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{

    public function create()
    {
        $Seo = Seo::first();
        return view('backend.seo.create',['Seo'=>$Seo]);
    }


    public function update(Request $request, $id)
    {
        $Seo = Seo::findOrFail($id);
        $Seo->update($request->all());

        return redirect()->route('seo.create');
    }

}
