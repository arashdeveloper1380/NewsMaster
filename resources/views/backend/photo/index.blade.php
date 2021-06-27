@extends('admin.admin_master')

@section('header')
    <style>
        th, td{
            text-align: center;
        }
        td{
            vertical-align: middle !important;
        }
    </style>
@endsection

@section('content')
    <h2>لیست گالری</h2>
    <br>
    @if (Session::has('msg'))
        <div class="msg">
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        </div>
    @endif
    <a href="{{ route('photo.create') }}" style="float: left;" class="btn btn-success">گالری جدید</a>
    <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>عنوان</th>
              <th>تصویر</th>
              <th>وضعیت</th>
              <th>مدریت</th>
            </tr>
          </thead>
          <tbody>
              @php($i=1)
            @foreach ($Photo as $key => $value)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $value->title }}</td>
                    <td>
                        <img src="{{ asset('upload/gallery').'/'. $value->image }}" width="160">
                    </td>
                    <td>
                        @if ($value->status == 1)
                            <span style="color: green; font-weight: bold">فعال</span>
                            @else
                            <span style="color: crimson; font-weight: bold">غیر فعال</span>
                            
                        @endif
                    </td>
                    <td style="width: 167px;">
                        <a href="{{ route('photo.edit',$value->id) }}" style="float: right" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('photo.destroy',$value->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="float: right">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        </div>
@endsection