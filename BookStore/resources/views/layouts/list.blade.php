<style>
    .bookException{
        color:#f26522;
    }
</style>
<aside class="aside-item sidebar-category collection-category">
    <div class="aside-title">
        <h2 class="title-head">
            <span>Danh mục</span>
        </h2>
    </div>
    <div class="aside-content">
        <nav class="nav-category navbar-toggleable-md">
            <ul class="nav navbar-pills">
                <li class="nav-item lv1 home">
                    <a class="nav-link" href="javascript:void(0)">Trang chủ</a>
                </li>

                <li class="nav-item lv1 introduce">
                    <a class="nav-link" href="javascript:void(0)">Giới thiệu</a>
                </li>

                <li class="nav-item lv1 bookExceptionColor
                ">
                    <a href="{{ route('book') }}" class="nav-link"><span class="bookExceptionColor">Thể loại</span></a>
                    <i class="fa fa-caret-down"></i>
                    <ul class="dropdown-menu">
                        <!-- Thể loại -->

                        <!-- Thể loại -->
                    </ul>
                </li>
                <li class="nav-item lv1 post">
                    <a class="nav-link" href="javascript:void(0)">Bài viết</a>
                </li>

                <li class="nav-item lv1 contact">
                    <a class="nav-link" href="javascript:void(0)">Liên hệ</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

@if (Request::is('bai-viet*'))
<div class="blog-aside aside-item blog-aside-article">
    <div>
        <div class="aside-title">
            <h2 class="title-head">
                <span>
                    <a href="{{ route('post') }}" title="Bài viết mới">Bài viết mới</a>
                </span>
            </h2>
        </div>
        <div class="aside-content-article aside-content">
            <div class="blog-list blog-image-list">
                @if (isset($post))
                    @foreach ($post as $item)
                        
                    <div class="loop-blog">
                        <div class="name-right">
                            <h3>
                                <a href="{{ route('postdetails', ['slug'=>$item->slug]) }}" 
                                    title="{{$item->title}}">{{$item->title}}</a>
                            </h3>
                        </div>
                    </div>
                    @endforeach
                @endif
               
            </div>
        </div>
    </div>
</div>
@endif