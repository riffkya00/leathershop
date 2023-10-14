<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <base href="/public"> --}}
    <meta charset="utf-8">
    <title>Leather Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('home/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet">

    {{-- Jquery CDN Link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    

    <!-- Header Start -->
        @include('home.header')
    <!-- Header End -->


    <!-- Slider Kategori dkk Start -->
        @include('home.slider')
    <!-- Slider Kategori dkk End -->

    {{-- Fitur dan Product Start --}}
        @include('home.featureproduct')
    {{-- Fitur dan Kategori Start --}}
        

    <!-- Diskon Start -->
        @include('home.discount')
    <!-- Diskon End -->


    <!-- Subscribe Start -->
        @include('home.subscribe')
    <!-- Subscribe End -->


    <!-- Products Start -->
        @include('home.ourproduct')
    <!-- Products End -->


    {{-- Comments and Replies Start --}}
    <div style="text-align:center;">
        <h1 style=
        "font-size: 30px; 
        text-align: center; 
        padding-top: 20px; 
        padding-bottom: 20px">
        Comments</h1>

        <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea style="height: 150px; width: 600px" placeholder="Comments Something Here.." name="comment"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Comment">
        </form>
    </div>

    <div style="padding-left: 20%;">
        <h1 style="font-size: 20px; padding-bottom: 20px">All Comments</h1>

        @foreach ($comment as $comment)
        <div style="padding-bottom: 20px">
            <b>{{ $comment->name }}</b>
            <p>{{ $comment->comment }}</p>       
            <a style="color: blue" href="javascript::void(0)" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>

            @foreach ($reply as $rep)
                @if($rep->comment_id==$comment->id)
                <div style="padding-left: 3%; padding-bottom: 10px; padding-bottom: 10px;">
                    <b>{{ $rep->name }}</b>
                    <p>{{ $rep->reply }}</p>
                    <a style="color: blue" href="javascript::void(0)" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>
                </div>
                @endif
            @endforeach

        </div>                 
        @endforeach

        {{-- Reply Text Box --}}
        <div style="display: none;" class="replyDiv">
            <form action="{{ url('add_reply') }}" method="post">
                @csrf
                <input type="text" name="commentId" id="commentId" hidden="">
                <textarea style="height: 100px; width: 500px" name="reply" placeholder="Writes Something Here.."></textarea>
                <br>
                <button type="submit" class="btn btn-primary">Reply</button>
                <a href="javascript::void(0)" class="btn" onclick="reply_close(this)">Close</a>
            </form>
        </div>
    </div>
    {{-- Comments and Replies End --}}


    <!-- Footer Start -->
        @include('home.footer')
    <!-- Footer End -->

    <script type="text/javascript">
        function reply(caller)
        {
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }
        function reply_close(caller)
        {
            $('.replyDiv').hide();
        }
    </script>

       <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


   <!-- JavaScript Libraries -->
    <script src="{{asset('home/https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('home/https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('home/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('home/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('home/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('home/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('home/js/main.js')}}"></script>
</body>

</html>