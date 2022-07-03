@extends('admin::layouts.master',['link'=>'Thêm quảng cáo'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item"><a href="javascript:void(0)" class="admin_ads">Quảng cáo</a></li>
    <li class="breadcrumb-item active">Thêm quảng cáo</li>

@endsection

@section('title', 'Thêm quảng cáo')

@section('content')
@section('css')
    <!--Upload Avatar-->
    <link rel="stylesheet" href="{{ asset('assets/upload/css/image.css') }}">
    <!--Upload Avatar-->
@endsection
{{-- Add Ads --}}
<div class="container ml-3 mr-3">
    <h1 class="text-center font-italic text-gray m-4">Thêm quảng cáo</h1>
    {{-- <form method="post" action="{{ route('addBook') }}" enctype="multipart/form-data">
        @csrf --}}
      
    <div class="form-group">
        <span id="successAdd"> </span>
    </div>
    <form>
        <div class="row align-items-start">
            <div class="col">
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="title"
                    placeholder="VD:Mỗi ngày một tựa sách, nâng niu từng trang tri thức" />
                        {{-- <div class="form-group"> --}}
                            <span id="error"></span>
                    
                        {{-- </div> --}}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="title">Vị trí</label>
                    <select class="form-control" name="location" id="location">
                        <option value="1">Banner trung tâm</option>
                        <option value="0">Banner bên trái</option>
                        <option value="2">Banner bên phải</option>

                    </select>
                    
                        {{-- </div> --}}
                </div>
            </div>
          


        </div>
       
       

        <div class="row">

            <div class="col">
                <div class="uploader">
                    <input id="file-upload" type="file" name="ads_images" accept="*" />
                    <label for="file-upload" id="file-drag">
                        <img id="file-image" src="#" alt="Preview" class="hidden">
                        <div id="start">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Hình ảnh minh họa</div>
                            <div id="notimage" class="hidden">Please select an image</div>
                            <span id="file-upload-btn" class="btn btn-primary">send images</span>
                        </div>
                        <div id="response" class="hidden">
                            <div id="messages"></div>
                            <progress class="progress" id="file-progress" value="0">
                                <span>0</span>%
                            </progress>
                        </div>
                    </label>

                </div>

            </div>
           
        </div>
        <div>
            
            <button type="submit" class="btn btn-primary add_ads">
                {{-- add_book --}}
                Save
            </button>

        </div>
    </form>
</div>
@section('js')
    <!--Upload Image-->
    <script src="{{ asset('assets/upload/js/image.js') }}"></script>
   
    <!--Upload Avatar-->
@endsection
@endsection
@include('admin::ajax.ajaxAds')
