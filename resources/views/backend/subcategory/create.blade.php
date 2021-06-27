@extends('admin.admin_master')

@section('content')
    <h2>ایجاد زیر دسته</h2>
    <br>
    <form action="{{ route('subcategory.store') }}" method="POST">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام زیر دسته</label>
                <input type="text" name="subcategory_fa" class="form-control" placeholder="نام زیر دسته مادر را وارد کنید...">
                @error('subcategory_fa')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">نام لاتین زیر دسته</label>
                <input type="text" name="subcategory_en" class="form-control" placeholder="نام لاتین زیر دسته مادر را وارد کنید...">
                @error('subcategory_en')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">دسته مادر</label>
                <select name="category_id" class="form-control">
                    @foreach ($Category as $item)
                        <option value="{{ $item->id }}">{{ $item->category_fa }}|{{ $item->category_en }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1">فعال</option>
                    <option value="0">عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="ثبت زیر دسته">
            </div>
        </div>
    </form>
@endsection