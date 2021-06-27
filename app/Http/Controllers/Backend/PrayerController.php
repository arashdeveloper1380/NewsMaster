<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Prayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrayerController extends Controller
{
    public function create()
    {
        $Prayer = Prayer::first();
        return view('backend.prayer.create',compact('Prayer'));
    }

    public function update(Request $request, $id)
    {
        $Prayer = Prayer::findOrFail($id);
        $Prayer->update($request->all());

        return redirect()->route('prayer.create');
    }
}
