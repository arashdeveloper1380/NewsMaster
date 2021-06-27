@extends('admin.admin_master')

@section('content')
<h2>مدریت اطلاع</h2>
<br>
<form action="{{ route('notice.update',$Notice->id) }}" method="POST">
@csrf
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label for="notice">اطلاع</label>
            <textarea name="notice" class="form-control" cols="30" rows="10">{{ $Notice->notice }}</textarea>
        </div>
        <div class="form-group">
            <label for="night">وضعیت</label>
            <select name="status" class="form-control" id="">
                <option value="1" @if ($Notice->status == 1) selected @endif>فعال</option>
                <option value="0" @if ($Notice->status == 0) selected @endif>غیر فعال</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="ویرایش">
        </div>
    </div>
</form>
@endsection