@extends('admin::layouts.master',['link'=>'Cập nhật tác giả'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item"><a href="javascript:void(0)" class="admin_author">Tác giả</a></li>
    <li class="breadcrumb-item active">Cập nhật tác giả</li>

@endsection

@section('title', 'Cập nhật tác giả')

@section('content')
@section('css')
    <!--Upload Avatar-->
    <link rel="stylesheet" href="{{ asset('assets/upload/css/avatar.css') }}">
    <!--Upload Avatar-->
@endsection
<div class="container ml-3 mr-3">
    <h1 class="text-center font-italic text-gray m-4">Cập nhật tác giả</h1>
    {{-- <form method="post" action="{{ route('updateAuthor') }}" enctype="multipart/form-data">
        @csrf --}}
    <div class="form-group">
        <span id="successUpdate"> </span>
    </div>
    <form>
        <div class="row align-items-start">
            <div class="col">
                <div class="form-group">
                    <input type="hidden" value="{{ $author->author_slug }}" name="author_slug" id="author_slug">

                    <label for="author_name">Họ và tên</label>
                    <input type="text" name="author_name" class="form-control" id="author_name"
                        value="{{ $author->author_name }}" placeholder="VD: Nguyễn Nhật Ánh" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="author_date">Ngày sinh</label>
                    <input type="date" name="author_date" class="form-control" id="author_date"
                        placeholder="VD: 17/06/1995" value="{{ $author->birth_date }}" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="author_cate">Thể loại</label> <br>
                    <select class="form-control List_cate" name="Cate" id="Cate">
                        {{-- <option selected></option> --}}
                        @foreach ($cate as $item)
                            <option {{ $item->id == $author->category_id ? 'selected' : false }}
                                value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" accept="*" name="authors_avatar"
                            {{ isset($author->avatar) ? 'disabled' : false }} />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview"
                            style="background-image: url({{ isset($author->avatar)? asset('images/author/' . $author->avatar): 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwbGozsS9QP10p16rZiCrQD0koXVkI4c7LwUHab9dkmFRcN0VqCkB37f2y0EnySItwykg&usqp=CAU' }});">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">

                <textarea class="form-control" id="author_desc" name="author_desc" style="height: 300px;" {!! $author->description !!}>
                    </textarea>
                <script>
                    CKEDITOR.replace('author_desc');
                </script>
            </div>
        </div>
        <div>

            <button type="submit" class="btn btn-primary update_author">
                Save
            </button>

        </div>
    </form>
</div>
@endsection

@include('admin::ajax.ajaxAuthor')
@include('admin::ajax.view')
