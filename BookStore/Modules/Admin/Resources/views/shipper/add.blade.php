@extends('admin::layouts.master',['link'=>'Thêm đơn vị vận chuyển'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item"><a href="javascript:void(0)" class="admin_shipper">Đơn vị vận chuyển</a></li>
    <li class="breadcrumb-item active">Thêm đơn vị vận chuyển</li>

@endsection

@section('title', 'Thêm đơn vị vận chuyển')

@section('content')
@section('css')
    <!--Upload Avatar-->
    <link rel="stylesheet" href="{{ asset('assets/upload/css/image.css') }}">
    <!--Upload Avatar-->
@endsection
{{-- Add Ads --}}
<div class="container ml-3 mr-3">
    <h1 class="text-center font-italic text-gray m-4">Thêm đơn vị vận chuyển</h1>
    {{-- <form method="post" action="{{ route('addBook') }}" enctype="multipart/form-data">
        @csrf --}}
      
    <div class="form-group">
        <span id="successAdd"> </span>
    </div>
    <form>
        <div class="row align-items-start">
            <div class="col">
                <div class="form-group">
                    <label for="shipper_name">Đơn vị vận chuyển</label>
                    <input type="text" name="shipper_name" class="form-control" id="shipper_name"
                    placeholder="VD: Viettel Post" />
                        {{-- <div class="form-group"> --}}
                            <span id="error"></span>
                        {{-- </div> --}}
                </div>
            </div>
          


        </div>
       
       

        <div class="row">

            <div class="col">
                <div class="uploader">
                    <input id="file-upload" type="file" name="logo" accept="*" />
                    <label for="file-upload" id="file-drag">
                        <img id="file-image" src="#" alt="Preview" class="hidden">
                        <div id="start">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Hình ảnh minh họa không được bỏ trống!</div>
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
            
            <button type="submit" class="btn btn-primary add_shipper">
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
@include('admin::ajax.ajaxShipper')
