@extends('admin.admin_master')

@section('content')
<h2>مدریت لایو</h2>
<br>
<form action="{{ route('livetv.update',$Livetv->id) }}" method="POST">
@csrf
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label for="embode_code">کد لایو</label>
            <input type="text" value="{{ $Livetv->embode_code }}" name="embode_code" class="form-control" placeholder="کد لایو را وارد کنید...">
        </div>
        <div class="form-group">
            <label for="night">وضعیت</label>
            <select name="status" class="form-control" id="">
                <option value="1" @if ($Livetv->status == 1) selected @endif>فعال</option>
                <option value="0" @if ($Livetv->status == 0) selected @endif>غیر فعال</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="ویرایش">
        </div>
    </div>
</form>
@endsection