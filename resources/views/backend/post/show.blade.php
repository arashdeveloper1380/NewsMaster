@extends('admin.admin_master')

@section('header')
    <style>
        .show_image{
            border-top-right-radius: 70px;
            border-bottom-left-radius: 70px;
            border-top-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .title{
            box-shadow: 1px 2px 7px 3px #ccc;
            text-align: center;
            padding: 5px 0px;
            border-radius: 10px;
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <h2>مطلب</h2>
    <br>
    <img class="show_image" src="{{ asset('upload/post').'/'.$PostShow->image }}" width="100%">
    <br><br><br><br>
    <div class="row title">
        <div class="col-lg-6 col-md-6">عنوان: <span style="color: crimson">{{ $PostShow->title_fa }}</span></div>
        <div class="col-lg-6 col-md-6">عنوان لاتین: <span style="color: crimson">{{ $PostShow->title_en }}</span></div>
    </div>
    <div class="row title">
        <div class="col-lg-6 col-md-6">دسته: <span style="color: crimson">{{ $PostShow->GetParentCategory->category_fa }} | {{ $PostShow->GetParentCategory->category_en }}</span></div>
        <div class="col-lg-6 col-md-6">زیر دسته: <span style="color: crimson">{{ $PostShow->GetChildCategory->subcategory_fa }} | {{ $PostShow->GetChildCategory->subcategory_en }}</span></div>
    </div>
    <div class="row title">
        <div class="col-lg-6 col-md-6">استان: <span style="color: crimson">{{ $PostShow->GetParentDistrict->district_fa }} | {{ $PostShow->GetParentDistrict->district_en }}</span></div>
        <div class="col-lg-6 col-md-6">شهر: <span style="color: crimson">{{ $PostShow->GetChildDistrict->subdistrict_fa }} | {{ $PostShow->GetChildDistrict->subdistrict_en }}</span></div>
    </div>
    <div class="row title">
        <div class="col-lg-6 col-md-6">تگ: <span style="color: crimson">{{ $PostShow->tags_fa }}</span></div>
        <div class="col-lg-6 col-md-6">تگ لاتین: <span style="color: crimson">{{ $PostShow->tags_en }}</span></div>
    </div>
    <div class="row title">
        <div class="col-lg-12 col-md-12">مطلب: <span style="color: crimson">{!! $PostShow->details_fa !!}</span></div>
    </div>
    <div class="row title">
        <div class="col-lg-12 col-md-12">مطلب لاتین: <span style="color: crimson">{!! $PostShow->details_en !!}</span></div>
    </div>
    @endsection