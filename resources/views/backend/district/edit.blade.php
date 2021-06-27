@extends('admin.admin_master')

@section('content')
    <h2>ویرایش استان <span style="color: crimson">{{ $District->district_fa }}</span></h2>
    <br>
    <form action="{{ route('district.update',$District->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام استان</label>
                <input type="text" value="{{ $District->district_fa }}" name="district_fa" class="form-control" placeholder="نام استان را وارد کنید...">
                @error('district_fa')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">نام لاتین استان</label>
                <input type="text"  value="{{ $District->district_en }}" name="district_en" class="form-control" placeholder="نام لاتین استان را وارد کنید...">
                @error('district_en')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1" @if($District->status == 1) selected @endif>فعال</option>
                    <option value="0" @if($District->status == 0) selected @endif>عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویراش استان">
            </div>
        </div>
    </form>
@endsection