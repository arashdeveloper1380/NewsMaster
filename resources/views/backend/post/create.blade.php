@extends('admin.admin_master')

@section('content')
    <h2>ایجاد مطلب</h2>
    <br>
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="title_fa">عنوان مطلب</label>
                    <input type="text" name="title_fa" class="form-control" placeholder="عنوان مطلب را وارد کنید">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="title_en">عنوان لاتین مطلب</label>
                    <input type="text" name="title_en" class="form-control" placeholder="عنوان مطلب را وارد کنید">
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
                            <option value="{{ $item->id }}">{{ $item->category_fa }}|{{ $item->category_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="subcategory_id">زیر دسته</label>
                    <select class="form-control" name="subcategory_id" id="subcategory_id">
                        <option disabled="" selected="">--- انتخاب زیر دسته ---</option>
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
                            <option value="{{ $item->id }}">{{ $item->district_fa }}|{{ $item->district_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="subdistrict_id">زیر دسته</label>
                    <select class="form-control" name="subdistrict_id" id="subdistrict_id">
                        <option disabled="" selected="">--- انتخاب زیر دسته ---</option>
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
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="tags_fa">تگ مطلب</label>
                    <input type="text" class="form-control" name="tags_fa">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="tags_fa">تگ لاتین مطلب</label>
                    <input type="text" class="form-control" name="tags_en">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="details_fa">توضحیات</label>
                    <textarea name="details_fa" class="ckeditor"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="details_en">توضحیات لاتین</label>
                    <textarea name="details_en" class="ckeditor"></textarea>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="headline">سر صفحه <span style="color: crimson">(زیر نویس)</span></label>
                    <input type="checkbox" style="vertical-align: middle;" name="headline" value="1">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="bigthumbnail">عکس بزرگ<span style="color: crimson">(بالای صفحه)</span></label>
                    <input type="checkbox" style="vertical-align: middle;" name="bigthumbnail" value="1">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="first_section">اولین مطلب<span style="color: crimson">(بالای صفحه)</span></label>
                    <input type="checkbox" style="vertical-align: middle;" name="first_section" value="1">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="first_section_thumbnail">اولین و عکس بزرگ</label>
                    <input type="checkbox" style="vertical-align: middle;" name="first_section_thumbnail" value="1">
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">ثبت مطلب</button>
        <input type="reset" value="پاکیدن" class="btn btn-info">

    </form>
@endsection

@section('footer')
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/get/subcategory/') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $("#subcategory_id").empty();
                            $.each(data,function(key,value){
                                $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_fa+'</option>');
                                });
                        },
                        
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
          $('select[name="district_id"]').on('change', function(){
              var district_id = $(this).val();
              if(district_id) {
                  $.ajax({
                      url: "{{  url('/get/subdistrict/') }}/"+district_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subdistrict_id").empty();
                           $.each(data,function(key,value){
                               $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_fa+'</option>');
                               });
                      },
                     
                  });
              } else {
                  alert('danger');
              }
          });
      });
 </script>
@endsection