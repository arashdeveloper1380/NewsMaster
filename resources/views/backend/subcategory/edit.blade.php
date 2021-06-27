@extends('admin.admin_master')

@section('content')
    <h2>ویرایش زیر دسته <span style="color: crimson">{{ $SubCategory->subcategory_fa }}</span></h2>
    <br>
    <form action="{{ route('subcategory.update',$SubCategory->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام زیر دسته</label>
                <input type="text" value="{{ $SubCategory->subcategory_fa }}" name="subcategory_fa" class="form-control" placeholder="نام زیر دسته مادر را وارد کنید...">
                @error('subcategory_fa')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">نام لاتین زیر دسته</label>
                <input type="text" value="{{ $SubCategory->subcategory_en }}" name="subcategory_en" class="form-control" placeholder="نام لاتین زیر دسته مادر را وارد کنید...">
                @error('subcategory_en')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">دسته مادر</label>
                <select name="category_id" class="form-control">
                    @foreach ($Category as $item)
                        <option value="{{ $item->id }}" @if($item->id == $SubCategory->category_id) selected @endif>{{ $item->category_fa }}|{{ $item->category_en }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1" @if($SubCategory->status == 1) selected @endif()>فعال</option>
                    <option value="0" @if($SubCategory->status == 0) selected @endif()>عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویرایش زیر دسته">
            </div>
        </div>
    </form>
@endsection