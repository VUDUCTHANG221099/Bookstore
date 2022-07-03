@extends('admin::layouts.master',['link'=>'Thêm tác giả'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item"><a href="javascript:void(0)" class="admin_author">Tác giả</a></li>
    <li class="breadcrumb-item active">Thêm tác giả</li>

@endsection

@section('title', 'Thêm tác giả')

@section('content')
@section('css')
     <!--Upload Avatar-->
 <link rel="stylesheet" href="{{ asset('assets/upload/css/avatar.css') }}">
 <!--Upload Avatar-->
@endsection
    <div class="container ml-3 mr-3">
        <h1 class="text-center font-italic text-gray m-4">Thêm tác giả</h1>
        {{-- <form method="post" action="{{route('addAuthor')}}">
            @csrf --}}
            <div class="form-group">
                <span id="successAdd"> </span>
            </div>
            <form>
            <div class="row align-items-start">
                <div class="col">
                    <div class="form-group">
                        <label for="Author_name">Họ và tên</label>
                        <input type="text" name="Author_name" class="form-control" id="Author_name"
                            placeholder="VD: Nguyễn Nhật Ánh" />
                            <span id="error"></span>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Author_date">Ngày sinh</label>
                        <input type="date" name="Author_date" class="form-control" id="Author_date"
                            placeholder="VD: 17/06/1995" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Author_cate">Thể loại</label> <br>
                        <select class="form-control List_cate" name="Cate" id="Cate">
                            @foreach ($cate as $item)
                            <option value="" hidden="">---</option>
                            
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="authors_avatar" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview"
                                style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwbGozsS9QP10p16rZiCrQD0koXVkI4c7LwUHab9dkmFRcN0VqCkB37f2y0EnySItwykg&usqp=CAU);">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col">

                    <textarea class="form-control" id="Author_desc" name="Author_desc" style="height: 300px;"></textarea>
                    <script>
                        CKEDITOR.replace('Author_desc');
                    </script>
                </div>
            </div>
            <div>

                <button type="submit" class="btn btn-primary add_Author">
                    Save
                </button>

            </div>
        </form>
    </div>
@endsection

@include('admin::ajax.ajaxAuthor')
@include('admin::ajax.view')
