@extends('admin.admin_master')

@section('header')
    <style>
        th, td{
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <h2>لیست کاربران</h2>
    <br>
    @if (Session::has('msg'))
        <div class="msg">
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        </div>
    @endif
    <a href="{{ route('writer.create') }}" style="float: left;" class="btn btn-success">کاربر جدید</a>
    <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>نام </th>
              <th>ایمیل</th>
              <th>مدریت</th>
            </tr>
          </thead>
          <tbody>
              @php($i=1)
            @foreach ($User as $key => $value)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td style="width: 167px;">
                        <a href="{{ route('writer.edit',$value->id) }}" style="float: right" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('writer.destroy',$value->id) }}" method="post">
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