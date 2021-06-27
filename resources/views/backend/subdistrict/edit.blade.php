@extends('admin.admin_master')

@section('content')
    <h2>ویرایش شهر <span style="color: crimson">{{ $SubDistrict->subdistrict_fa }}</span></h2>
    <br>
    <form action="{{ route('subdistrict.update',$SubDistrict->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام شهر</label>
                <input type="text" name="subdistrict_fa" class="form-control" value="{{ $SubDistrict->subdistrict_fa }}" placeholder="نام شهر را وارد کنید...">
                @error('subdistrict_fa')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">نام لاتین شهر</label>
                <input type="text" name="subdistrict_en" class="form-control" value="{{ $SubDistrict->subdistrict_en }}" placeholder="نام لاتین شهر را وارد کنید...">
                @error('subdistrict_en')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="district_id">دسته مادر</label>
                <select name="district_id" class="form-control">
                    @foreach ($District as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $SubDistrict->district_id) selected @endif>{{ $item->district_fa }}|{{ $item->district_en }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1">فعال</option>
                    <option value="0">عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویرایش شهر">
            </div>
        </div>
    </form>
@endsection