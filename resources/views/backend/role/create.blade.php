@extends('admin.admin_master')

@section('content')
    <h2>ایجاد کاربر جدید</h2>
    <br>
    <form action="{{ route('writer.store') }}" method="POST">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام</label>
                <input type="text" name="name" class="form-control" placeholder="نام را وارد کنید...">
                @error('name')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">ایمیل</label>
                <input type="email" name="email" class="form-control" placeholder="ایمیل را وارد کنید...">
                @error('email')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_fa">رمز عبور</label>
                <input type="password" name="password" class="form-control" placeholder="رمز عبور را وارد کنید...">
                @error('password')
                    <span style="color: crimson">{{ $message }}</span>
                @enderror
            </div>
            <h5>سطح دسترسی کاربران</h5>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="category">دسته بندی</label>
                        <input type="checkbox" name="category" value="1">
                    </div>
                    <div class="form-group">
                        <label for="subcategory">زیر دسته</label>
                        <input type="checkbox" name="subcategory" value="1">
                    </div>
                    <div class="form-group">
                        <label for="district">استان</label>
                        <input type="checkbox" name="district" value="1">
                    </div>
                    <div class="form-group">
                        <label for="gallery">گالری</label>
                        <input type="checkbox" name="gallery" value="1">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="subdistrict">شهر</label>
                        <input type="checkbox" name="subdistrict" value="1">
                    </div>
                    <div class="form-group">
                        <label for="post">مطالب</label>
                        <input type="checkbox" name="post" value="1">
                    </div>
                    <div class="form-group">
                        <label for="social">شبکه اجتماعی</label>
                        <input type="checkbox" name="social" value="1">
                    </div>
                    <div class="form-group">
                        <label for="role">سطح دسترسی</label>
                        <input type="checkbox" name="role" value="1">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="prayer">وقت نماز</label>
                        <input type="checkbox" name="prayer" value="1">
                    </div>
                    <div class="form-group">
                        <label for="livetv">پخش زنده</label>
                        <input type="checkbox" name="livetv" value="1">
                    </div>
                    <div class="form-group">
                        <label for="notice">اطلاع</label>
                        <input type="checkbox" name="notice" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="ثبت کاربر">
            </div>
        </div>
    </form>
@endsection