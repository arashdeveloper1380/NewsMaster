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

@section('content')
    
    @section('Social')

    @foreach ($Social as $key => $value)
        <a href="{{ $value->link }}"><i class="fa fa-{{ $value->name }}" aria-hidden="true"></i>{{ $value->name }}</a>
    @endforeach

    @endsection{{--------------- End Social ---------------}}


    <section class="single_page">						
		<div class="container-fluid">											
		<div class="row">
			<div class="col-md-12">
				<div class="single_info">
					<span>
						<a href="#"><i class="fa fa-home" aria-hidden="true"></i> /
						</a>  
                        
                        		
					</span>				    
				</div>
			</div>
			<div class="col-md-9 col-sm-8">	
				@if (Session::get('lang') == 'fa')
					@foreach ($SubCatPost as $cp)			
						<div class="archive_post_sec_again">
							<div class="row">
								
								<div class="col-md-8 col-sm-7">
									<div class="archive_padding_again">
										<div class="archive_heading_01">
											<a style="display: block;text-align: right;" href="{{ route('site.show',$cp->id) }}">{{ $cp->title_fa }}</a>
										</div>
										<div class="archive_dtails">
											{!! Str::limit($cp->details_fa, 70, '...')  !!}
										</div>
										<div class="dtails_btn"><a href="{{ route('site.show',$cp->id) }}">...ادامه</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-5">
									<div class="archive_img_again">
										<a href="{{ route('site.show',$cp->id) }}"><img src="{{ asset('upload/post').'/'.$cp->image }}" alt="Notebook"></a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				@else
					@foreach ($SubCatPost as $cp)			
						<div class="archive_post_sec_again">
							<div class="row">
								<div class="col-md-4 col-sm-5">
									<div class="archive_img_again">
										<a href="{{ route('site.show',$cp->id) }}"><img src="{{ asset('upload/post').'/'.$cp->image }}" alt="Notebook"></a>
									</div>
								</div>
								<div class="col-md-8 col-sm-7">
									<div class="archive_padding_again">
										<div class="archive_heading_01">
											<a href="{{ route('site.show',$cp->id) }}">{{ $cp->title_en }}</a>
										</div>
										<div class="archive_dtails">
											{!! Str::limit($cp->details_en, 70, '...')  !!}
										</div>
										<div class="dtails_btn"><a href="{{ route('site.show',$cp->id) }}">Read More...</a>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					@endforeach
				@endif			
												                          
                	{{ $SubCatPost->links() }}
			</div>
			<div class="col-md-3 col-sm-4">
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
			</div>			
		</div>
	</div>
</section>
    
@endsection