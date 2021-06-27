@extends('admin.admin_master')

@section('content')
    <h2>ایجاد دسته مارد</h2>
    <br>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام دسته مادر</label>
                <input type="text" name="category_fa" class="form-control" placeholder="نام دسته مادر را وارد کنید...">
                @error('category_fa')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">نام لاتین دسته مادر</label>
                <input type="text" name="category_en" class="form-control" placeholder="نام لاتین دسته مادر را وارد کنید...">
                @error('category_en')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1">فعال</option>
                    <option value="0">عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="ثبت دسته مادر">
            </div>
        </div>
    </form>
@endsection