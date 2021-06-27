@extends('admin.admin_master')

@section('content')
    <h2>ایجاد استان</h2>
    <br>
    <form action="{{ route('district.store') }}" method="POST">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام استان</label>
                <input type="text" name="district_fa" class="form-control" placeholder="نام استان را وارد کنید...">
                @error('district_fa')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">نام لاتین استان</label>
                <input type="text" name="district_en" class="form-control" placeholder="نام لاتین استان را وارد کنید...">
                @error('district_en')
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
                <input type="submit" class="btn btn-success" value="ثبت استان">
            </div>
        </div>
    </form>
@endsection