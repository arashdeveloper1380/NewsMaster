@extends('main.home_master')

@section('header')
    <style>
        h4.lead-heading-01{
            text-align: right;
        }
    </style>
@endsection

@section('category'){{--------------- Start Category ---------------}}

    @foreach ($Category as $value)
    @php
        $SubCategory = DB::table('subcategories')
        ->where('category_id',$value->id)
        ->where('status',1)
        ->get();
    @endphp
    
    <li class="dropdown">
        @if (session()->get('lang') == 'fa')
            <a href="{{ url('catpost').'/'.$value->id }}/{{ $value->category_fa }}" class="dropdown-toggle">
        @else
            <a href="{{ url('catpost').'/'.$value->id }}/{{ $value->category_en }}" class="dropdown-toggle">
        @endif
        
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

    

<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-lg-1"></div>
                    <div class="col-md-10 col-sm-10">
                        @if (session()->get('lang') == 'fa')
                        <div class="lead-news">
                            <div class="service-img"><a href="{{ route('site.show',$FirstSectionTumbnail->id) }}"><img src="{{ asset('upload/post').'/'.$FirstSectionTumbnail->image }}" style="border-radius: 10px" width="800px" alt="{{ $FirstSectionTumbnail->title_fa }}"></a></div>
                            <div class="content">
                                <h4 class="lead-heading-01"><a href="#">{{ $FirstSectionTumbnail->title_fa }}</a> </h4>
                            </div>
                        </div>
                        @else
                        <div class="lead-news">
                            <div class="service-img"><a href="{{ route('site.show',$FirstSectionTumbnail->id) }}"><img src="{{ asset('upload/post').'/'.$FirstSectionTumbnail->image }}" style="border-radius: 10px" width="800px" alt="{{ $FirstSectionTumbnail->title_en }}"></a></div>
                            <div class="content">
                                <h4 class="lead-heading-01" style="text-align: left"><a href="#">{{ $FirstSectionTumbnail->title_en }}</a> </h4>
                            </div>
                        </div>
                        @endif
                        
                    </div>
                    
                </div>
                    <div class="row">
                        @if (session()->get('lang') == 'fa')
                            @foreach ($FirstSection as $key => $value)
                                <div class="col-md-3 col-sm-3" style="float: right">
                                    <div class="top-news">
                                        <a href="{{ route('site.show',$value->id) }}"><img src="{{ asset('upload/post').'/'.$value->image }}" style="border-radius: 10px" alt="{{ $value->title_fa }}"></a>
                                        <h4 class="heading-02"><a href="#">{{ Str::limit($value->title_fa, 50, '...')  }}</a> </h4>
                                    </div>
                                </div> 
                            @endforeach
                        @else
                            @foreach ($FirstSection as $key => $value)
                                <div class="col-md-3 col-sm-3">
                                    <div class="top-news">
                                        <a href="{{ route('site.show',$value->id) }}"><img src="{{ asset('upload/post').'/'.$value->image }}" style="border-radius: 10px" alt="{{ $value->title_en }}"></a>
                                        <h4 class="heading-02"><a href="#"> {{ Str::limit($value->title_en, 50, '...')  }}</a> </h4>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        
                        </div>
                
                <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="add"><img src="{{ asset('frontend/assets/img/top-ad.jpg') }}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->	
                
                <!-- news-start -->
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title"><a href="#">
                                @if (session()->get('lang') == 'fa')
                                    {{ $FirstCategory->category_fa }} <span>بیشتر <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
                                @else
                                    {{ $FirstCategory->category_en }} <span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
                                @endif
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        @if (session()->get('lang') == 'fa')
                                            <a href="#"><img src="{{ asset('upload/post').'/'.$FirstCatPostBig->image }}" alt="{{ $FirstCatPostBig->title_fa }}"></a>
                                            <h4 class="heading-02"><a href="#">{{ $FirstCatPostBig->title_fa }}</a> </h4>
                                        @else
                                            <a href="#"><img src="{{ asset('upload/post').'/'.$FirstCatPostBig->image }}" alt="{{ $FirstCatPostBig->title_fa }}"></a>
                                            <h4 class="heading-02"><a href="#">{{ $FirstCatPostBig->title_en }}</a> </h4>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @if (session()->get('lang') == 'fa')

                                        @foreach ($GetFiltertCatPostBig as $gfcp)
                                        <div class="image-title">
                                            <a href="#"><img src="{{ asset('upload/post').'/'.$gfcp->image }}" alt="{{ $gfcp->title_fa }}"></a>
                                            <h4 class="heading-03"><a href="#">{{ Str::limit($gfcp->title_fa, 30, '...')  }}</a> </h4>
                                        </div>
                                        @endforeach 

                                    @else

                                        @foreach ($GetFiltertCatPostBig as $gfcp)
                                        <div class="image-title">
                                            <a href="#"><img src="{{ asset('upload/post').'/'.$gfcp->image }}" alt="{{ $gfcp->title_en }}"></a>
                                            <h4 class="heading-03"><a href="#">{{ Str::limit($gfcp->title_en, 30, '...')  }}</a> </h4>
                                        </div>
                                        @endforeach 

                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            @if (session()->get('lang') == 'fa')
                                <div class="cetagory-title"><a href="#">{{ $SecondCategory->category_fa }}<span>بیشتر <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                            @else
                                <div class="cetagory-title"><a href="#">{{ $SecondCategory->category_en }}<span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                            @endif
                            <div class="row">
                                @if (session()->get('lang') == 'fa')
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="#"><img src="{{ asset('upload/post').'/'.$SecondCatPostBig->image }}" alt="Notebook"></a>
                                            <h4 class="heading-02"><a href="#">{{ Str::limit($SecondCatPostBig->title_fa, 50, '...') }}</a> </h4>
                                        </div>
                                    </div> 
                                @else
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="#"><img src="{{ asset('upload/post').'/'.$SecondCatPostBig->image }}" alt="Notebook"></a>
                                            <h4 class="heading-02"><a href="#">{{ Str::limit($SecondCatPostBig->title_en, 50, '...') }}</a> </h4>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="col-md-6 col-sm-6">
                                    @if (session()->get('lang') == 'fa')
                                        @foreach ($SecondFilterCatPostBig as $sfcp)
                                            <div class="image-title">
                                                <a href="#"><img src="{{ asset('upload/post').'/'.$sfcp->image }}" alt="Notebook"></a>
                                                <h4 class="heading-03"><a href="#">{{ Str::limit($sfcp->title_fa, 30, '...') }}</a> </h4>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach ($SecondFilterCatPostBig as $sfcp)
                                            <div class="image-title">
                                                <a href="#"><img src="{{ asset('upload/post').'/'.$sfcp->image }}" alt="Notebook"></a>
                                                <h4 class="heading-03"><a href="#">{{ Str::limit($sfcp->title_en, 30, '...') }}</a> </h4>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>					
            </div>
            <div class="col-md-3 col-sm-3">
                <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->	
                
                <!-- youtube-live-start -->	
                @if (session()->get('lang') == "en")
                <div class="cetagory-title-03">Live TV</div>
                @else
                <div class="cetagory-title-03">شبکه زنده</div>
                @endif
                
                
                <div class="photo">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                        @foreach ($LiveTv as $item)
                            <iframe width="729" height="410" src="{{ $item->embode_code }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endforeach
                    </div>
                </div>
                
                <!-- /.youtube-live-close -->	
                
                <!-- facebook-page-start -->
                <div class="cetagory-title-03">Facebook </div>
                <div class="fb-root">
                    facebook page here
                </div><!-- /.facebook-page-close -->	
                
                <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->	
            </div>
        </div>
    </div>
</section><!-- /.1st-news-section-close -->

<!-- 2nd-news-section-start -->	
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">International <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Politics <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******* -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Biz-Econ<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Education <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- add-start -->	
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="assets/img/top-ad.jpg" alt="" /></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="assets/img/top-ad.jpg" alt="" /></div>
            </div>
        </div><!-- /.add-close -->	
        
    </div>
</section><!-- /.2nd-news-section-close -->

<!-- 3rd-news-section-start -->	
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <div class="cetagory-title-02"><a href="#">Feature  <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="top-news">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                </div>
                <!-- ******* -->
                <br />
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="bg-gray">
                            <div class="top-news">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="assets/img/top-ad.jpg" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->	


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
                        <div role="tabpanel" class="tab-pane fade" id="tab23">	
                            <div class="news-titletab">
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
                                </div>
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
                
               
               <br><br><br><br><br>
               

            </div>
        </div>
    </div>
</section><!-- /.3rd-news-section-close -->

    {{-- @if (Session::get('lang') == 'fa')
        <div class="col-md-12 col-sm-12">
            <div class="cetagory-title-02"><a href="#">جستوجو ر اساس مناطق<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> </span></a></div>
        </div>
        <div class="row">
            <form action="">
                @csrf
                <div class="col-lg-2">
                    <input type="submit" value="جستوجو..." class="btn btn-success">
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <select class="form-control" name="district_id" id="">
                            <option value="">sdsd</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <select class="form-control" name="district_id" id="">
                            <option value="">sdsd</option>
                        </select>
                    </div>
                </div>
                
            </form>
        </div>
    @else
    <div class="row">
        <form action="">
            @csrf
            
            <div class="col-lg-5">
                <div class="form-group">
                    <select class="form-control" name="district_id" id="">
                        <option value="">sdsd</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <select class="form-control" name="subdistrict_id" id="">
                        <option value="">sdsd</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <input type="submit" value="Search..." class="btn btn-success">
            </div>
        </form>
    </div>
    @endif --}}
    





<!-- gallery-section-start -->	
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                @if (session()->get('lang') == 'fa')
                    <div class="gallery_cetagory-title">گالری تصاویر</div> 
                @else
                    <div class="gallery_cetagory-title"> Photo Gallery </div>
                @endif
                

                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="photo_screen">
                            <div class="myPhotos" style="width:100%">
                                  <img src="{{ asset('upload/gallery').'/'.$PhotoGalleryFirst->image }}"  alt="Avatar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="photo_list_bg">
                            @if (session()->get('lang') == 'fa')
                                @foreach ($PhotoGallery as $pg)
                                    <div class="photo_img photo_border active">
                                        <img src="{{ asset('upload/gallery').'/'.$pg->image }}" alt="image" onclick="currentDiv(1)">
                                        <div class="heading-03">
                                            {{ $pg->title }}
                                        </div>
                                    </div>
                                    
                                @endforeach
                            @else
                                @foreach ($PhotoGallery as $pg)
                                    <div class="photo_img photo_border active">
                                        <img src="{{ asset('upload/gallery').'/'.$pg->image }}" alt="image" onclick="currentDiv(1)">
                                        <div class="heading-03">
                                            {{ $pg->title }}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            
                        </div>
                    </div>
                </div>

                <!--=======================================
                Video Gallery clickable jquary  start
            ========================================-->

                        <script>
                                var slideIndex = 1;
                                showDivs(slideIndex);

                                function plusDivs(n) {
                                  showDivs(slideIndex += n);
                                }

                                function currentDiv(n) {
                                  showDivs(slideIndex = n);
                                }

                                function showDivs(n) {
                                  var i;
                                  var x = document.getElementsByClassName("myPhotos");
                                  var dots = document.getElementsByClassName("demo");
                                  if (n > x.length) {slideIndex = 1}
                                  if (n < 1) {slideIndex = x.length}
                                  for (i = 0; i < x.length; i++) {
                                     x[i].style.display = "none";
                                  }
                                  for (i = 0; i < dots.length; i++) {
                                     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                  }
                                  x[slideIndex-1].style.display = "block";
                                  dots[slideIndex-1].className += " w3-opacity-off";
                                }
                            </script>

            <!--=======================================
                Video Gallery clickable  jquary  close
            =========================================-->

            </div>
            <div class="col-md-4 col-sm-5">
                <div class="gallery_cetagory-title"> photo Gallery </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="video_screen">
                            <div class="myVideos" style="width:100%">
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                <iframe width="853" height="480" src="https://www.youtube.com/embed/AWM8164ksVY?list=RDAWM8164ksVY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    
                        <div class="gallery_sec owl-carousel">

                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                <img src="assets/img/news.jpg"  alt="Avatar">
                                <div class="heading-03">
                                    <div class="content_padding">
                                       Kumar Sanu tests positive for coronavirus
                                    </div>
                                </div>
                            </div>

                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                <img src="assets/img/news.jpg"  alt="Avatar">
                                <div class="heading-03">
                                    <div class="content_padding">
                                   Kumar Sanu tests positive for coronavirus
                                    </div>
                                </div>
                            </div>

                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                <img src="assets/img/news.jpg"  alt="Avatar">
                                <div class="heading-03">
                                    <div class="content_padding">
                                      Kumar Sanu tests positive for coronavirus  
                                    </div>
                                </div>
                            </div>

                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                <img src="assets/img/news.jpg"  alt="Avatar">
                                <div class="heading-03">
                                    <div class="content_padding">
                                       Kumar Sanu tests positive for coronavirus
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <script>
                    var slideIndex = 1;
                    showDivss(slideIndex);

                    function plusDivs(n) {
                      showDivss(slideIndex += n);
                    }

                    function currentDivs(n) {
                      showDivss(slideIndex = n);
                    }

                    function showDivss(n) {
                      var i;
                      var x = document.getElementsByClassName("myVideos");
                      var dots = document.getElementsByClassName("demo");
                      if (n > x.length) {slideIndex = 1}
                      if (n < 1) {slideIndex = x.length}
                      for (i = 0; i < x.length; i++) {
                         x[i].style.display = "none";
                      }
                      for (i = 0; i < dots.length; i++) {
                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                      }
                      x[slideIndex-1].style.display = "block";
                      dots[slideIndex-1].className += " w3-opacity-off";
                    }
                </script>

            </div>
        </div>
    </div>
</section><!-- /.gallery-section-close -->

@endsection