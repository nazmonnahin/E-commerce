<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="frontend/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="frontend/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="frontend/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="frontend/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('frontend.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('frontend.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
         @include('frontend.why_section')
      <!-- end why section -->
      
      <!-- arrival section -->
         @include('frontend.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
         @include('frontend.products')
      <!-- end product section -->

      {{-- comment start here --}}


      <div style="text-align: center">
         <h1 style="font-size: 30px; text-align:center; padding-top:20px; padding-bottom:20px;">Comment</h1>

         <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea name="comment" style="height: 150px; width:600px" placeholder="Comment something here" ></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Comment">
         </form>
      </div>

      <div style="padding-left: 20%; padding-top:50px;">
         <h1 style="padding-bottom:20px;">All Comments</h1>

         @foreach ($comment as $comment)
         <div>
            <b>{{ $comment->name }}</b>
            <p>{{ $comment->comment }}</p>
            <a href="javascript::voil(0)" onclick="reply(this)" data-Commentid="{{ $comment->id }}"><b>Reply</b></a>
            @foreach ($reply as $rep)
            @if ($rep->comment_id==$comment->id)
            <div style="padding-left: 3%; padding-bottom:10px; padding-bottom:10px">
               <b>{{ $rep->name }}</b>
               <p>{{ $rep->reply }}</p>
               <a href="javascript::voil(0)" onclick="reply(this)" data-Commentid="{{ $comment->id }}"><b>Reply</b></a>

            </div>                 
            @endif
            @endforeach

         </div>   
         <br>
         @endforeach
         

         <div style="display: none" class="replyDiv">
         <form action="{{ url('add_reply') }}" method="POST">
            @csrf
            <input type="text" id="commentId" name="commentId" hidden>
            <textarea name="reply" style="width: 400px" placeholder="write something here"></textarea>
            <br>
            <button type="submit" class="btn btn-warning">Reply</button>
            <a href="javascript::void(0);" class="btn btn-danger"  onclick="reply_close(this)" >Close</a>
         </form>
         </div>
      </div>


        {{-- comment end here --}}

      <!-- client section -->
         @include('frontend.client')
      <!-- end client section -->
      <!-- footer start -->
         @include('frontend.footer')


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
      
      <!-- jQery -->
      <script src="frontend/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="frontend/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="frontend/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="frontend/js/custom.js"></script>
   </body>
</html>