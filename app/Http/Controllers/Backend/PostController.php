<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Post = Post::orderBy('id','DESC')->paginate(4);
        return view('backend.post.index',compact('Post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = Category::orderBy('id','DESC')->get();
        $District = District::orderBy('id','DESC')->get();
        return view('backend.post.create',compact('Category','District'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Post = new Post($request->all());
        $Post->user_id = Auth::id();
        $Post->post_date = date('d-m-Y');
        $Post->post_month = date("F");

        if($request->hasFile('image')){
            $file_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($request->file('image')->move('upload/post',$file_name)){
                $Post->image = $file_name;
            }
        }

        $Post->saveOrFail();

        return redirect()->route('post.index')->with('msg','مطلب با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Post = Post::findOrFail($id);
        $Category = Category::orderBy('id','DESC')->get();
        $SubCategory = SubCategory::orderBy('id','DESC')->get();
        $District = District::orderBy('id','DESC')->get();
        $SubDistrict = SubDistrict::orderBy('id','DESC')->get();
        return view('backend.post.edit',[
            'Post'          =>  $Post,
            'District'      =>  $District,
            'Category'      =>  $Category,
            'SubCategory'   =>  $SubCategory,
            'SubDistrict'   =>  $SubDistrict
            ]);
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
        $Post = Post::findOrFail($id);
        $Post->user_id = Auth::id();
        $Post->post_date = date('d-m-Y');
        $Post->post_month = date("F");
        $Post->headline = $request->headline;
        $Post->first_section = $request->first_section;
        $Post->first_section_thumbnail = $request->first_section_thumbnail;
        $Post->bigthumbnail = $request->bigthumbnail;

        $Post->update($request->all());

        return redirect()->route('post.index')->with('msg','مطلب با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post = Post::findOrFail($id);
        $image = $Post->image;
        $Post->delete();

        if(!empty($image)){
            unlink('upload/post'.$image);
        }
        
        return redirect()->route('post.index')->with('msg','مطلب با موفقیت حذف شد');
    }

    public function GetSubCategory($category_id)
    {
        $sub = DB::table('subcategories')->where('category_id',$category_id)->get();
        return response()->json($sub);
    }
      
      
    public function GetSubDistrict($district_id)
    {
        $sub = DB::table('subdistrict')->where('district_id',$district_id)->get();
        return response()->json($sub);
    }
}
