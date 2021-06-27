@extends('admin.admin_master')

@section('content')
    <h2>ویرایش گالری <img src="{{ asset('upload/gallery').'/'.$Photo->image }}" width="150" style="border-radius: 10px"></h2>
    <br>
    <form action="{{ route('photo.update',$Photo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" value="{{ $Photo->title }}" name="title" class="form-control" placeholder="عنوان را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="image">تصویر</label>
                <input type="file" name="image" class="form-control">
                <img src="{{ asset('upload/gallery').'/'.$Photo->image }}" width="150" style="border-radius: 10px">
            </div>
            <div class="form-group">
                <label for="status">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1" @if ($Photo->status == 1 ) selected @endif>فعال</option>
                    <option value="0" @if ($Photo->status == 0 ) selected @endif>عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویرایش">
            </div>
        </div>
    </form>
@endsection