@extends('admin::layouts.master',['link'=>'Cập nhật quảng cáo'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item"><a href="javascript:void(0)" class="admin_ads">Quảng cáo</a></li>
    <li class="breadcrumb-item active">Cập nhật quảng cáo</li>

@endsection

@section('title', 'Cập nhật quảng cáo')

@section('content')
@section('css')
    <!--Upload Avatar-->
    <link rel="stylesheet" href="{{ asset('assets/upload/css/image.css') }}">
    <!--Upload Avatar-->
@endsection
{{-- Add Ads --}}
<div class="container ml-3 mr-3">
    <h1 class="text-center font-italic text-gray m-4">Cập nhật quảng cáo</h1>
    <form method="post" action="{{ route('UpdateAds') }}" enctype="multipart/form-data">
        @method('put')
        @csrf

    {{-- <div class="form-group">
        <span id="successUpdate"> </span>
    </div> --}}
    {{-- <form> --}}
        <input type="hidden" value="{{ $ads->slug }}" name="slug" id="slug">

        <div class="row align-items-start">
            <div class="col">
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $ads->title }}"
                        placeholder="VD:Mỗi ngày một tựa sách, nâng niu từng trang tri thức" />
                    {{-- <div class="form-group"> --}}
                    {{-- <span id="error"></span> --}}
                    {{-- </div> --}}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="title">Vị trí</label>
                    <select class="form-control" name="location" id="location">
                        <option value="1" {{ $ads->type == 1 ? 'selected' : false }}>Banner trung tâm</option>
                        <option value="0" {{ $ads->type == 0 ? 'selected' : false }}>Banner bên trái</option>
                        <option value="2" {{ $ads->type == 2 ? 'selected' : false }}>Banner bên phải</option>

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
                        <img id="file-image"
                            src="{{ isset($ads->avatar) ? asset('images/ads/' . $ads->avatar) : false }}"
                            alt="Preview" class="{{ isset($ads->avatar) ? false : 'hidden' }}">
                        <div id="start" class="{{ isset($ads->avatar) ? 'hidden' : false }}">
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

            <button type="submit" class="btn btn-primary update_ads">
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
