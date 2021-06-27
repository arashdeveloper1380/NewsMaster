@extends('admin.admin_master')

@section('content')
    <h2>ایجاد شبکه اجتماعی</h2>
    <br>
    <form action="{{ route('social.store') }}" method="POST">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="name">نام دسته مادر</label>
                <input type="text" name="name" class="form-control" placeholder="نام شبکه اجتماعی را وارد کنید...">
                @error('category_fa')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="link">نام لاتین دسته مادر</label>
                <input type="text" name="link" class="form-control" placeholder="لینک را وارد کنید...">
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
                <input type="submit" class="btn btn-success" value="ثبت">
            </div>
        </div>
    </form>
@endsection