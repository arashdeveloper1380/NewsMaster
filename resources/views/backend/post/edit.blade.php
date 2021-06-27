@extends('admin.admin_master')

@section('content')
    <h2>ویرایش مطلب <span style="color: cornflowerblue">{{ $Post->title_fa }}</span></h2>
    <br>
    <form action="{{ route('post.update',$Post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="title_fa">عنوان مطلب</label>
                    <input type="text" value="{{ $Post->title_fa }}" name="title_fa" class="form-control" placeholder="عنوان مطلب را وارد کنید">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="title_en">عنوان لاتین مطلب</label>
                    <input type="text" value="{{ $Post->title_en }}" name="title_en" class="form-control" placeholder="عنوان مطلب را وارد کنید">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="category_id">دسته والد</label>
                    <select class="form-control" name="category_id" id="">
                        <option disabled="" selected="">---انتخاب دسته مادر ---</option>
                        @foreach ($Category as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $Post->category_id) selected @endif>{{ $item->category_fa }}|{{ $item->category_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="subcategory_id">زیر دسته</label>
                    <select class="form-control" name="subcategory_id" id="subcategory_id">
                        <option disabled="" selected="">--- انتخاب زیر دسته ---</option>
                        @foreach ($SubCategory as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $Post->subcategory_id) selected @endif>{{ $item->subcategory_fa }}|{{ $item->subcategory_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="district_id">استان</label>
                    <select class="form-control" name="district_id" id="">
                        <option disabled="" selected="">--- انتخاب استان ---</option>
                        @foreach ($District as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $Post->district_id) selected @endif>{{ $item->district_fa }}|{{ $item->district_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="subdistrict_id">زیر دسته</label>
                    <select class="form-control" name="subdistrict_id" id="subdistrict_id">
                        <option disabled="" selected="">--- انتخاب زیر دسته ---</option>
                        @foreach ($SubDistrict as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $Post->subdistrict_id) selected @endif>{{ $item->subdistrict_fa }}|{{ $item->subdistrict_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="district_id">تصویر</label>
                    <br>
                    <input type="file" name="image" id="">
                    <img src="{{ asset('upload/post').'/'.$Post->image }}" width="150">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="tags_fa">تگ مطلب</label>
                    <input type="text" value="{{ $Post->tags_fa }}" class="form-control" name="tags_fa">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="tags_fa">تگ لاتین مطلب</label>
                    <input type="text" value="{{ $Post->tags_en }}" class="form-control" name="tags_en">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="details_fa">توضحیات</label>
                    <textarea name="details_fa" class="ckeditor">
                        {!! $Post->details_fa !!}
                    </textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="details_en">توضحیات لاتین</label>
                    <textarea name="details_en" class="ckeditor">
                        {!! $Post->details_en !!}
                    </textarea>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="headline">سر صفحه <span style="color: crimson">(زیر نویس)</span></label>
                    <input type="checkbox" @if ($Post->headline == 1) checked @endif style="vertical-align: middle;" name="headline" value="1">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="bigthumbnail">عکس بزرگ<span style="color: crimson">(بالای صفحه)</span></label>
                    <input type="checkbox" @if ($Post->bigthumbnail == 1) checked @endif style="vertical-align: middle;" name="bigthumbnail" value="1">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="first_section">اولین مطلب<span style="color: crimson">(بالای صفحه)</span></label>
                    <input type="checkbox" @if ($Post->first_section == 1) checked @endif style="vertical-align: middle;" name="first_section" value="1">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="first_section_thumbnail">اولین و عکس بزرگ</label>
                    <input type="checkbox" @if ($Post->first_section_thumbnail == 1) checked @endif style="vertical-align: middle;" name="first_section_thumbnail" value="1">
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-warning">ویرایش مطلب</button>

    </form>
@endsection

@section('footer')
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
@endsection