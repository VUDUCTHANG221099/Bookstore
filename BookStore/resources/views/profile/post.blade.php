<div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac my_post">
    <h1 class="title-head margin-top-0" id="PostTitle"></h1>

    <fieldset class="form-group select-field not-vn">
        <select name="SelectPost" class="form-control add has-content" value="" id="SelectPost">
            <option value="" hidden>-------------</option>
            <option value="1" selected id="listPost">Danh sách bài viết</option>
            <option value="2" id="CreatePost">Tạo bài viết</option>
            


        </select>

    </fieldset>
    <div class="ListPost">
        <table class="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Thời gian tạo</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>

                @if (isset($post))
                    @foreach ($post as $item)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $carbon::parse($item->create_at)->translatedFormat('d/m/Y H:i:s') }}
                            </td>








                            <td class="text-center">
                                <style>
                                    .text-blue,
                                    .fa-edit {
                                        color: #007bff !important;
                                    }

                                    .text-danger {
                                        color: #dc3545 !important;

                                    }

                                    .border-white {
                                        border: none;

                                    }

                                </style>
                                <a href="{{ route('postdetails', ['slug' => $item->slug]) }}"
                                    class="border">
                                    <i class="fa fa-eye text-blue"></i>
                                </a>
                                <a href="{{ route('updatePostFE', ['slug' => $item->slug]) }}"
                                    class="border">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button style="border: none;background: white; padding: 0"
                                    value="{{ $item->slug }}" class="border RemovePostFE">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif


            </tbody>
        </table>
       

    </div>
    <div class="CreatePost">
        <form class="has-validation-callback">
            <span id="successPost"></span>
            {{-- @csrf --}}
            {{-- @csrf action="{{ route('CreatePost') }}" method="post" --}}
            <div class="pop_bottom">
                <div class="form_address">

                    <div class="field">
                        <fieldset class="form-group">

                            <h3>
                                <label for="title">
                                    Tiêu đề</label>
                            </h3>
                            <input type="text" placeholder="Tiêu đề" class="form-control title" id="title" name="title" value="">
                            <span id="errorsPost"></span>
                        </fieldset>
                    </div>
                    <div class="field">
                        <div class="col-4">
                            <div class="uploader">
                                <input id="file-upload" type="file" name="illustration" accept="*" />
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
                    <div class="field">
                        <textarea class="form-control" id="desc_post" name="desc_post" style="height: 300px;"></textarea>
                        <script>
                            CKEDITOR.replace('desc_post');
                        </script>
                    </div>




                </div>
                <div class="btn-row">

                    <button class="btn btn-lg btn-primary btn-submit" id="Createpost" type="submit"><span>Tạo bài viết</span></button>
                </div>
            </div>
        </form>

    </div>
    
</div>