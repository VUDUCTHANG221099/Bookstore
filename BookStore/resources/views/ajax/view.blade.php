@push('scripts')
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();

            //Route Login
            $('.loginView').click(function() {
                window.location = "{{ route('loginViewFE') }}";
            })
            //Route Login
            //Route Register
            $('.RegisterView').click(function() {
                window.location = "{{ route('registerViewFE') }}";
            })
            //Route Register


            //Route home
            $('.home').addClass("{{ Request::route()->getName() == 'index' ? 'active' : false }}")
            $('.home').click(function() {
                window.location = "{{ route('index') }}";
            })
            //Route home 

            //Route introduce
            $('.introduce').addClass("{{ Request::route()->getName() == 'introduce' ? 'active' : false }}")
            $('.introduce').click(function() {
                window.location = "{{ route('introduce') }}";
            })
            //Route introduce


            //Route book
            $('.book').addClass("{{ Request::route()->getName() == 'book' ? 'active' : false }}")
            $('.book').addClass("{{ Request::route()->getName() == 'bookDetailsFE' ? 'active' : false }}")
            $('.bookExceptionColor').addClass(
                "{{ Request::route()->getName() == 'book' ? 'bookException' : false }}")
            $('.bookExceptionColor').addClass(
                "{{ Request::route()->getName() == 'bookDetailsFE' ? 'bookException' : false }}")
            $('.book').click(function() {
                // $('.bookException').css('color','#f26522');
                window.location = "{{ route('book') }}";
            })
            //Route book

            //Route post

            $('.post').addClass("{{ Request::route()->getName() == 'post' ? 'active' : false }}")
            $('.post').addClass("{{ Request::route()->getName() == 'postdetails' ? 'active' : false }}")
            
            $('.post').click(function() {
                window.location = "{{ route('post') }}";
            })
            //Route post
            //Route contact

            //Route contact

            //Route bookHot
            $('.bookHot').click(function() {
                window.location = "/sach/sach-noi-bat";
            })
            //Route bookHot


            //Route Profile
            $('.tai_khoan').click(function() {
                window.location = "{{ route('profileFE') }}";
            })
            $('.my_orderView').click(function() {
                window.location = "{{ route('profileFEOrder') }}";
            })
            $('.change_passwordView').click(function() {
                window.location = "{{ route('profileFEChangePass') }}";
            })
            $('.my_addressView').click(function() {
                window.location = "{{ route('profileFEAddress') }}";
            })
            $('.my_PostView').click(function() {
                window.location = "{{ route('profileFEPost') }}";
            })
            //Route View the Profile
            if ("{{ Request()->is('tai-khoan') }}") {
                $('.tai_khoan').addClass('active');
                $('.my_profile').show();
                $('.my_order').hide();
                $('.change_password').hide();
                $('.my_address').hide();
                $('.my_post').hide();

            } else if ("{{ Request()->is('tai-khoan/don-hang') }}") {
                $('.my_orderView').addClass('active');
                $('.my_order').show();
                $('.my_profile').hide();
                $('.change_password').hide();
                $('.my_address').hide();
                $('.my_post').hide();
            } else if ("{{ Request()->is('tai-khoan/doi-mat-khau') }}") {
                $('.change_passwordView').addClass('active');
                $('.change_password').show()
                $('.my_profile').hide();
                $('.my_order').hide();
                $('.my_address').hide();
                $('.my_post').hide();

            } else if ("{{ Request()->is('tai-khoan/dia-chi') }}") {
                $('.my_addressView').addClass('active');
                $('.my_address').show();
                $('.my_profile').hide();
                $('.my_order').hide();
                $('.change_password').hide();
                $('.my_post').hide();
            } else {
                $('.my_PostView').addClass('active');
                $('.my_post').show();
                $('.my_profile').hide();
                $('.my_order').hide();
                $('.change_password').hide();
                $('.my_profile').hide();
                $('.my_address').hide();


            }

            //Ẩn hiện
            // console.log("{{Auth()->check()}}");
            if ("{{Auth()->check()}}") {

                $('.checkLogout').show();
                $('.checkLogin').hide();

            } else {
                $('.checkLogout').hide();
                $('.checkLogin').show();
            }


          
            $('#PostTitle').text('Bài viết');
            $('.ListPost').show();
            $('.CreatePost').hide();
            


          
            $('#SelectPost').click(function() {
                let selectPost = $('#SelectPost').val();
                switch (selectPost) {
                    case '1':
                        
                        $('#PostTitle').text('Bài viết');
                        $('.ListPost').show();
                        $('.CreatePost').hide();
                       
                        $('#SelectPost>#listPost').attr('selected', 'selected');
                        


                        
                        break;
                    case '2':
                        $('.ListPost').hide();
                        $('.CreatePost').show();
                   
                        $('#PostTitle').text('Tạo bài viết')

                        $('#SelectPost>#CreatePost').attr('selected', 'selected');
                        
                        break;
                  

                    
                }

               
            })


            

        });
    </script>
@endpush
