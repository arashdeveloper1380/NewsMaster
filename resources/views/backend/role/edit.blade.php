@extends('admin.admin_master')

@section('content')
    <h2>ویرایش کاربر <span style="color: cornflowerblue">{{ $User->name }}</span></h2>
    <br>
    <form action="{{ route('writer.update',$User->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام</label>
                <input type="text" value="{{ $User->name }}" name="name" class="form-control" placeholder="نام را وارد کنید...">
                @error('name')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">ایمیل</label>
                <input type="email" value="{{ $User->email }}" name="email" class="form-control" placeholder="ایمیل را وارد کنید...">
                @error('email')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <h5>سطح دسترسی کاربران</h5>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="category">دسته بندی</label>
                        <input type="checkbox" name="category" @if ($User->category == 1) checked @endif value="1">
                    </div>
                    <div class="form-group">
                        <label for="subcategory">زیر دسته</label>
                        <input type="checkbox" name="subcategory" @if ($User->subcategory == 1) checked @endif value="1">
                    </div>
                    <div class="form-group">
                        <label for="district">استان</label>
                        <input type="checkbox" name="district" @if ($User->district == 1) checked @endif value="1">
                    </div>
                    <div class="form-group">
                        <label for="gallery">گالری</label>
                        <input type="checkbox" name="gallery" @if ($User->gallery == 1) checked @endif value="1">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="subdistrict">شهر</label>
                        <input type="checkbox" name="subdistrict" @if ($User->subdistrict == 1) checked @endif value="1">
                    </div>
                    <div class="form-group">
                        <label for="post">مطالب</label>
                        <input type="checkbox" name="post" @if ($User->post == 1) checked @endif value="1">
                    </div>
                    <div class="form-group">
                        <label for="social">شبکه اجتماعی</label>
                        <input type="checkbox" name="social" @if ($User->social == 1) checked @endif value="1">
                    </div>
                    <div class="form-group">
                        <label for="role">سطح دسترسی</label>
                        <input type="checkbox" name="role" @if ($User->role == 1) checked @endif value="1">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="prayer">وقت نماز</label>
                        <input type="checkbox" name="prayer" @if ($User->prayer == 1) checked @endif value="1">
                    </div>
                    <div class="form-group">
                        <label for="livetv">پخش زنده</label>
                        <input type="checkbox" name="livetv" @if ($User->livetv == 1) checked @endif value="1">
                    </div>
                    <div class="form-group">
                        <label for="notice">اطلاع</label>
                        <input type="checkbox" name="notice" @if ($User->notice == 1) checked @endif value="1">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویرایش کاربر">
            </div>
        </div>
    </form>
@endsection