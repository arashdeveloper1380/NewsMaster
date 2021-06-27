@extends('admin.admin_master')

@section('content')
    <h2>ویرایش شبکه اجتماعی <span style="color: cornflowerblue">{{ $Social->name }}</span></h2>
    <br>
    <form action="{{ route('social.update',$Social->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="name">نام دسته مادر</label>
                <input type="text" value="{{ $Social->name }}" name="name" class="form-control" placeholder="نام شبکه اجتماعی را وارد کنید...">
                @error('category_fa')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="link">نام لاتین دسته مادر</label>
                <input type="text" value="{{ $Social->link }}" name="link" class="form-control" placeholder="لینک را وارد کنید...">
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
                <input type="submit" class="btn btn-warning" value="ویرایش">
            </div>
        </div>
    </form>
@endsection