@extends('admin.admin_master')

@section('content')
    <h2>مدریت SEO</h2>
    <br>
    <form action="{{ route('seo.update',$Seo->id) }}" method="POST">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="meta_author">Meta Author</label>
                <input type="text" value="{{ $Seo->meta_author }}" name="meta_author" class="form-control" placeholder="Meta Author را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text" value="{{ $Seo->meta_title }}" name="meta_title" class="form-control" placeholder="Meta Title را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="meta_keyword">Meta Keyword</label>
                <input type="text" value="{{ $Seo->meta_keyword }}" name="meta_keyword" class="form-control" placeholder="Meta Keyword را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <input type="text" value="{{ $Seo->meta_description }}" name="meta_description" class="form-control" placeholder="Meta Description را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="google_verification">Google Analytics</label>
                <input type="text" value="{{ $Seo->google_verification }}" name="google_verification" class="form-control" placeholder="Google Analytics را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="alexa_analytics">Alexa Analytics</label>
                <input type="text" value="{{ $Seo->alexa_analytics }}" name="alexa_analytics" class="form-control" placeholder="Alexa Analytics را وارد کنید...">
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویرایش">
            </div>
        </div>
    </form>

@endsection