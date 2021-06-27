@extends('main.home_master')

@section('category'){{--------------- Start Category ---------------}}

    @foreach ($Category as $value)
    @php
        $SubCategory = DB::table('subcategories')
        ->where('category_id',$value->id)
        ->where('status',1)
        ->get();
    @endphp
    <li class="dropdown">

        <a href="{{ url('catpost').'/'.$value->id }}/{{ $value->category_en }}" class="dropdown-toggle">
            @if (session()->get('lang') == 'fa')
            {{ $value->category_fa }}
            @else
            {{ $value->category_en }}
            @endif
        <b class="caret"></b></a>
            <ul class="dropdown-menu">
            @foreach ($SubCategory as $value)
            
                <li>
                    <a href="{{ url('subcategory').'/'.$value->id }}/{{ $value->subcategory_fa }}">
                        @if (session()->get('lang') == 'fa')
                        {{ $value->subcategory_fa }}
                        @else
                        {{ $value->subcategory_en }}
                        @endif
                        
                    </a>
                </li>
            
            @endforeach
        </ul>
    </li>
    @endforeach

@endsection{{--------------- End Category ---------------}}



@section('content'){{--------------- Start Social ---------------}}

@section('Social')

    @foreach ($Social as $key => $value)
        <a href="{{ $value->link }}"><i class="fa fa-{{ $value->name }}" aria-hidden="true"></i>{{ $value->name }}</a>
    @endforeach

@endsection{{--------------- End Social ---------------}}


@section('content')
<section class="single-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session()->get('lang') == 'fa')
                <ol class="breadcrumb" style="direction: rtl;">   
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>					   
                     <li><a href="#">{{ $PostShow->category_fa }}</a></li>
                     <li><a href="#">{{ $PostShow->subcategory_fa }}</a></li>
                 </ol> 
                @else
                <ol class="breadcrumb">   
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>					   
                     <li><a href="#">{{ $PostShow->category_en }}</a></li>
                     <li><a href="#">{{ $PostShow->subcategory_en }}</a></li>
                 </ol>
                @endif
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @if (session()->get('lang') == 'fa')
                    <header class="headline-header margin-bottom-10">
                        <h1 class="headline text-right">{{ $PostShow->title_fa }}</h1>
                    </header>
                @else
                    <header class="headline-header margin-bottom-10">
                        <h1 class="headline">{{ $PostShow->title_en }}</h1>
                    </header>
                @endif									
                
     
     
             <div class="article-info margin-bottom-20">
              <div class="row">
                    <div class="col-md-6 col-sm-6"> 
                     <ul class="list-inline">
                     
                     
                     <li>LOOK AT </li>     <li><i class="fa fa-clock-o"></i> 09 My 2020 </li>
                     </ul>
                    
                    </div>
                    <div class="col-md-6 col-sm-6 pull-right"> 						
                        <ul class="social-nav">
                            <li><a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('#'),'facebook-share-dialog','width=626,height=436'); return false;" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="" onclick="javascript:window.open('https://twitter.com/share?text=‘#'); return false;" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="" onclick="window.open('https://plus.google.com/share?url=#'); return false;" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank" title="Print" rel="nofollow" class="print"><i class="fa fa-print"></i></a></li>
                    
                        </ul>						   
                    </div>						
                </div>				 
             </div>				
        </div>
      </div>
      <!-- ******** -->
      <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="single-news" style="text-align: right;">
                <img src="{{ asset('upload/post').'/'.$PostShow->image }}" style="border-radius: 10px" alt="{{ $PostShow->title_fa }}" />
                @if (session()->get('lang') == 'fa')
                    <h4 class="caption text-right"> {{ $PostShow->title_fa }} </h4>
                @else
                    <h4 class="caption"> {{ $PostShow->title_en }} </h4>
                @endif

                @if (session()->get('lang') == 'fa')
                    <p>{!! $PostShow->details_fa !!}</p>
                @else

                    <p>{!! $PostShow->details_en !!}</p>
                @endif

            </div>
            <!-- ********* -->
            <div class="row">
                @if (session()->get('lang') == 'fa')
                    <div class="col-md-12"><h2 class="heading text-right">مطالب مشابه</h2></div>
                @else
                    <div class="col-md-12"><h2 class="heading">Related News</h2></div> 
                @endif
            </div>

                @php
                    $RelatedPost = DB::table('post')->where('category_id',$PostShow->category_id)->orderBy('id','DESC')->limit(6)->get();
                @endphp
                
            <div class="row">
                @if (session()->get('lang') == 'fa')
                    @foreach ($RelatedPost as $rp)
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset('upload/post').'/'.$rp->image }}" style="border-radius: 10px" alt="{{ $rp->title_fa }}"></a>
                                <h4 class="heading-02"><a href="#">{{ Str::limit($rp->title_fa, 25, '...')  }}</a> </h4>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($RelatedPost as $rp)
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset('upload/post').'/'.$rp->image }}" style="border-radius: 10px" alt="{{ $rp->title_fa }}"></a>
                                <h4 class="heading-02"><a href="#">{{ Str::limit($rp->title_fa, 25, '...')  }}</a> </h4>
                            </div>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="tab-header">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    @if (session()->get('lang') == 'fa')
                        <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">جدیدترین</a></li>
                        <li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">تصادفی</a></li>
                    @else
                        <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">Latest</a></li>
                        <li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">Random</a></li>
                    @endif
                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content ">
                    @if (session()->get('lang') == 'fa')
                        <div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">
                                @foreach ($LatestPost as $latest)
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#" style="display: block;text-align: right;">{{ Str::limit($latest->title_fa, 40, '...')  }}</a> </h4>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    @else
                        <div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">
                                @foreach ($LatestPost as $latest)
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">{{ Str::limit($latest->title_en, 40, '...')  }}</a> </h4>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    @endif
                    
                    <div role="tabpanel" class="tab-pane fade" id="tab22">
                        <div class="news-titletab">
                            @if (Session::get('lang') == 'fa')
                                @foreach ($RandomPost as $rand)
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">{{ Str::limit($latest->title_fa, 40, '...')  }}</a> </h4>
                                    </div>
                                @endforeach
                            @else
                                @foreach ($RandomPost as $rand)
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">{{ Str::limit($latest->title_en, 40, '...')  }}</a> </h4>
                                    </div>
                                @endforeach
                            @endif
                            
                            
                        </div>                                          
                    </div>
                </div>
            </div>
            <!-- Namaj Times -->
            @if (session()->get('lang') == 'fa')
            <div class="cetagory-title-03">وقت نماز </div>
            <ul style="text-align: center;margin-right: 15px">
                @foreach ($Prayer as $prayers)
                <li style="list-style: none">{{ $prayers->morning }}:نماز صبح</li>
                <li style="list-style: none">{{ $prayers->afternoon }}:نماز عصر</li>
                <li style="list-style: none">{{ $prayers->night }}:نماز شب</li>
                @endforeach
            </ul>
            @else
            <div class="cetagory-title-03">Prayer Time</div>
            <ul style="text-align: center;margin-right: 15px">
                @foreach ($Prayer as $prayers)
                <li style="list-style: none">{{ $prayers->morning }}:Prayer Morning</li>
                <li style="list-style: none">{{ $prayers->afternoon }}:Prayer AftreNoon</li>
                <li style="list-style: none">{{ $prayers->night }}:Prayer Night</li>
                @endforeach
            </ul>
            @endif
            

        </div>
      </div>
    </div>
</section>
@endsection