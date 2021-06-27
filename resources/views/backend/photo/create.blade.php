@extends('admin.admin_master')

@section('content')
    <h2>ایجاد گالری</h2>
    <br>
    <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" name="title" class="form-control" placeholder="عنوان را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="image">تصویر</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1">فعال</option>
                    <option value="0">عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="ثبت">
            </div>
        </div>
    </form>
@endsection