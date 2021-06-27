@extends('admin.admin_master')

@section('header')
    <style>
        th, td{
            text-align: center;
        }
        .middle{
            vertical-align: middle !important;
        }
    </style>
@endsection

@section('content')
    <h2>لیست مطالب</h2>
    <br>
    @if (Session::has('msg'))
        <div class="msg">
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        </div>
    @endif
    <a href="{{ route('post.create') }}" style="float: left;" class="btn btn-success">مطلب جدید</a>
    <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>عنوان</th>
              <th>دسته والد</th>
              <th>زیر دسته</th>
              <th>استان</th>
              <th>شهر</th>
              <th>تصویر</th>
              <th>تاریخ</th>
              <th>مدریت</th>
            </tr>
          </thead>
          <tbody>
              @php($i=1)
            @foreach ($Post as $key => $value)
                <tr>
                    <td class="middle">{{ $i++ }}</td>
                    <td class="middle">{{ $value->title_fa }}</td>
                    <td class="middle">{{ $value->GetParentCategory->category_fa }}</td>
                    <td class="middle"><div class="alert alert-success">{{ $value->GetChildCategory->subcategory_fa }}</div></td>
                    <td class="middle">{{ $value->GetParentDistrict->district_fa }}</td>
                    <td class="middle"><div class="alert alert-success">{{ $value->GetChildDistrict->subdistrict_fa }}</div></td>
                    <td class="middle">
                        <img src="{{ asset('upload/post').'/'.$value->image }}" width="150">
                    </td>
                    
                    <td class="middle">{{ Carbon\Carbon::parse($value->post_date)->diffForHumans() }}</td>
                    <td style="width: 167px;" class="middle">
                        <a href="{{ route('post.edit',$value->id) }}" style="float: right" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('post.destroy',$value->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="float: right">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{ $Post->links() }}
        </div>
@endsection