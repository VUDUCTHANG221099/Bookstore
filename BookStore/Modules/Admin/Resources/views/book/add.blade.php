@extends('admin::layouts.master',['link'=>'Thêm sách'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item"><a href="javascript:void(0)" class="admin_book">Sách</a></li>
    <li class="breadcrumb-item active">Thêm sách</li>

@endsection

@section('title', 'Thêm sách')

@section('content')
@section('css')
    <!--Upload Avatar-->
    <link rel="stylesheet" href="{{ asset('assets/upload/css/image.css') }}">
    <!--Upload Avatar-->
@endsection
<div class="container ml-3 mr-3">
    <h1 class="text-center font-italic text-gray m-4">Thêm sách</h1>
    {{-- <form method="post" action="{{ route('addBook') }}" enctype="multipart/form-data">
        @csrf --}}
      
    <div class="form-group">
        <span id="successAdd"> </span>
    </div>
    <form>
        <div class="row align-items-start">
            <div class="col">
                <div class="form-group">
                    <label for="book_name">Tên sách</label>
                    <input type="text" name="book_name" class="form-control" id="book_name"
                        placeholder="VD: Tư duy nhanh và chậm" />
                        {{-- <div class="form-group"> --}}
                            <span id="error"></span>
                        {{-- </div> --}}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="language">Ngôn ngữ</label> <br>
                    <select class="form-control" name="language" id="language">
                        <option value="" hidden="">---</option>
                        <option value="1">Tiếng Việt</option>
                        <option value="2">Tiếng Anh</option>
                        <option value="3">Ngôn ngữ khác</option>

                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="category">Thể loại</label> <br>
                    <select class="form-control category" name="category" id="category">
                        {{-- <option selected></option> --}}
                        @foreach ($cate as $item)
                        <option value="" hidden="">---</option>
                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>


        </div>
        <div class="row align-item-start">
            <div class="col">
                <div class="form-group">
                    <label for="nxb">Nhà xuất bản </label> <br>
                    <input type="text" name="nxb" class="form-control" id="nxb"
                        placeholder="VD: Nhà xuất bản Kim Đồng" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="year_publish">Năm xuất bản </label> <br>
                    <input type="number" name="year_publish" class="form-control" id="year_publish"
                        placeholder="VD:Năm 1990" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="author">Tác giả </label> <br>
                    <select class="form-control author" name="author" id="author">
                        {{-- <option selected></option> --}}
                        @foreach ($author as $item)
                        <option value="" hidden="">---</option>
                            <option value="{{ $item->id }}">{{ $item->author_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>



        </div>
        <div class="row align-item-start">
            <div class="col">
                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="text" name="quantity" class="form-control money"  id="quantity"
                        placeholder="VD:500 quyển" />

                </div>

            </div>
            <div class="col">
                <div class="form-group">
                    <label for="price">Giá tiền</label>
                    <input type="text" name="price" class="form-control money" id="price" placeholder="VD: 25.000đ" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="pages">Số trang </label> <br>
                    <input type="text"  name="pages" class="form-control money" id="pages" placeholder="VD: 200 trang" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="is_top">Nổi bật </label> <br>
                    Có: <input type="radio" name="is_top" value="1" >
                    Không: <input type="radio"  name="is_top" value="0" checked>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-4">
                <div class="uploader">
                    <input id="file-upload" type="file" name="book_images" accept="*" />
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
            <div class="col">

                <textarea class="form-control" id="book_desc" name="book_desc" style="height: 300px;"></textarea>
                <script>
                    CKEDITOR.replace('book_desc');
                </script>
            </div>
        </div>
        <div>
            
            <button type="submit" class="btn btn-primary add_book">
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

@include('admin::ajax.ajaxBook')
@include('admin::ajax.view')
