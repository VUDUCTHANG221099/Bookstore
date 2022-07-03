@extends('layouts.master')
@section('title')
404 không tìm thấy trang
@endsection
@section('content')
@include('layouts.breadcrumb', [
    'link' => "404 không tìm thấy trang"])
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-404 margin-bottom-50">
                    <h1 class="title-section-page">Lỗi không tìm thấy trang</h1>
                    <p>Xin lỗi, chúng tôi không tìm thấy kết quả nào phù hợp. Xin vui lòng quay lại trang chủ</p>
                    <a href="{{ route('index') }}" class="btn btn-primary">Về trang chủ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
