@extends('admin.admin_master')

@section('content')
    <h2>ویرایش دسته مارد <span style="color: crimson">{{ $Category->category_fa }}</span></h2>
    <br>
    <form action="{{ route('category.update',$Category->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام دسته مادر</label>
                <input type="text" value="{{ $Category->category_fa }}" name="category_fa" class="form-control" placeholder="نام دسته مادر را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="category_fa">نام لاتین دسته مادر</label>
                <input type="text" value="{{ $Category->category_en }}" name="category_en" class="form-control" placeholder="نام لاتین دسته مادر را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1" @if ($Category->status == 1) selected @endif>فعال</option>
                    <option value="0" @if ($Category->status == 0) selected @endif>عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویرایش دسته مادر">
            </div>
        </div>
    </form>
@endsection