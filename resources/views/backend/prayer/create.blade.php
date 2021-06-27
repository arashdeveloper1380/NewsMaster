@extends('admin.admin_master')

@section('content')
<h2>مدریت وقت نماز</h2>
<br>
<form action="{{ route('prayer.update',$Prayer->id) }}" method="POST">
@csrf
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label for="morning">وقت نماز صبح</label>
            <input type="text" value="{{ $Prayer->morning }}" name="morning" class="form-control" placeholder="وقت نماز صبح را وارد کنید...">
        </div>
        <div class="form-group">
            <label for="afternoon">وقت نماز ظهر</label>
            <input type="text" value="{{ $Prayer->afternoon }}" name="afternoon" class="form-control" placeholder="وقت نماز ظهر را وارد کنید...">
        </div>
        <div class="form-group">
            <label for="night">وقت نماز شب</label>
            <input type="text" value="{{ $Prayer->night }}" name="night" class="form-control" placeholder="وقت نماز شب را وارد کنید...">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="ویرایش">
        </div>
    </div>
</form>
@endsection