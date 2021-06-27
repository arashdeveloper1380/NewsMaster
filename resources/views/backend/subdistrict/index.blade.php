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
    <h2>لیست شهر ها</h2>
    <br>
    @if (Session::has('msg'))
        <div class="msg">
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        </div>
    @endif
    <a href="{{ route('subdistrict.create') }}" style="float: left;" class="btn btn-success">شهر جدید</a>
    <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>نام شهر</th>
              <th>نام لاتین شهر</th>
              <th>نام استان</th>
              <th>وضعیت</th>
              <th>مدریت</th>
            </tr>
          </thead>
          <tbody>
              @php($i=1)
            @foreach ($SubDistrict as $key => $value)
                <tr>
                    <td class="middle">{{ $i++ }}</td>
                    <td class="middle">{{ $value->subdistrict_fa }}</td>
                    <td class="middle">{{ $value->subdistrict_en }}</td>
                    <td class="middle"><div class="alert alert-success">{{ $value->GetParent->district_fa }}</div></td>
                    <td class="middle">
                        @if ($value->status == 1)
                            <span style="color: green; font-weight: bold">فعال</span>
                            @else
                            <span style="color: crimson; font-weight: bold">غیر فعال</span>
                            
                        @endif
                    </td class="middle">
                    <td style="width: 167px;" class="middle">
                        <a href="{{ route('subdistrict.edit',$value->id) }}" style="float: right" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('subdistrict.destroy',$value->id) }}" method="post">
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