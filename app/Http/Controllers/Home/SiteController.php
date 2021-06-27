<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Livetv;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Prayer;
use App\Models\Social;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use DB;
class SiteController extends Controller
{
    public function index()
    {
        $Category = Category::where(['status'=>1])->get();
        $Social = Social::where(['status'=>1])->get();
        $LiveTv = Livetv::where(['status'=>1])->get();
        $Prayer = Prayer::all();

        $FirstSectionTumbnail = Post::orderBy('id','DESC')->where(['first_section_thumbnail'=>1])->first();
        $FirstSection = Post::orderBy('id','DESC')->where(['first_section'=>1])->limit(8)->get();

        $FirstCategory = Category::first();
        $FirstCatPostBig = Post::orderBy('id','DESC')->where(['category_id'=>$FirstCategory->id])->where(['bigthumbnail'=>1])->first();
        $GetFiltertCatPostBig = Post::orderBy('id','DESC')->where(['category_id'=>$FirstCategory->id])->where(['bigthumbnail'=>null])->limit(3)->get();

        $SecondCategory = Category::skip(1)->first();
        $SecondCatPostBig = Post::orderBy('id','DESC')->where(['category_id'=>$SecondCategory->id])->where(['bigthumbnail'=>1])->first();
        $SecondFilterCatPostBig = Post::orderBy('id','DESC')->where(['category_id'=>$SecondCategory->id])->where(['bigthumbnail'=>null])->limit(3)->get();

        $PhotoGalleryFirst = Photo::orderBy('id','DESC')->where(['status'=>1])->first();
        $PhotoGallery = Photo::orderBy('id','DESC')->skip(1)->limit(7)->get();

        $LatestPost = Post::orderBy('id','DESC')->limit(5)->get();
        $RandomPost = Post::inRandomOrder()->limit(5)->get();


        return view('main.home',[
            'Category'=>$Category,
            'Social'=>$Social,
            'LiveTv'=>$LiveTv,
            'Prayer'=>$Prayer,
            'FirstSectionTumbnail'=>$FirstSectionTumbnail,
            'FirstSection'=>$FirstSection,
            'FirstCategory'=>$FirstCategory,
            'FirstCatPostBig'=>$FirstCatPostBig,
            'GetFiltertCatPostBig'=>$GetFiltertCatPostBig,
            'SecondCategory'=>$SecondCategory,
            'SecondCatPostBig'=>$SecondCatPostBig,
            'SecondFilterCatPostBig'=>$SecondFilterCatPostBig,
            'PhotoGalleryFirst'=>$PhotoGalleryFirst,
            'PhotoGallery'=>$PhotoGallery,
            'LatestPost'=>$LatestPost,
            'RandomPost'=>$RandomPost
        ]);
    }

    public function show($id)
    {
        $LiveTv = Livetv::where(['status'=>1])->get();
        $Prayer = Prayer::all();
        $LatestPost = Post::orderBy('id','DESC')->limit(5)->get();
        $RandomPost = Post::inRandomOrder()->limit(5)->get();
        $PostShow = DB::table('post')
        ->join('categories','post.category_id','categories.id')
        ->join('subcategories','post.subcategory_id','subcategories.id')
        ->select('post.*','categories.category_fa','categories.category_en','subcategories.subcategory_fa','subcategories.subcategory_en')
        ->where('post.id',$id)->first();
        $Category = Category::where(['status'=>1])->get();
        $Social = Social::where(['status'=>1])->get();
        
        return view('main.single',compact('PostShow','Category','Social','LatestPost','RandomPost','LiveTv','Prayer'));
    }

    public function catpost($id, $category_en)
    {
        $CatPost= DB::table('post')->orderBy('id','DESC')->where('category_id',$id)->paginate(3);

        $PostCategory = DB::table('post')
        ->join('categories','post.category_id','categories.id')
        ->select('post.*','categories.category_fa','categories.category_en')
        ->where('category_id',$id)
        ->first();

        $Category = Category::where(['status'=>1])->get();
        $Social = Social::where(['status'=>1])->get();

        return view('main.archive',compact('CatPost','Category','Social','PostCategory'));
    }

    public function subcatpost($id, $category_en)
    {
        $SubCatPost= DB::table('post')->orderBy('id','DESC')->where('subcategory_id',$id)->paginate(3);

        $PostSubCategory = DB::table('post')
        ->join('subcategories','post.category_id','subcategories.id')
        ->select('post.*','subcategories.subcategory_fa','subcategories.subcategory_en')
        ->where('subcategory_id',$id)
        ->first();

        $Category = Category::where(['status'=>1])->get();
        $Social = Social::where(['status'=>1])->get();

        return view('main.subpost',compact('SubCatPost','Category','Social','PostSubCategory'));
    }

    public function en()
    {
        Session()->get('lang');
        Session()->forget('lang');
        Session()->put('lang','en');

        return redirect()->back();  
    }

    public function fa()
    {
        Session()->get('lang');
        Session()->forget('lang');
        Session()->put('lang','fa');

        return redirect()->back();
    }


}
