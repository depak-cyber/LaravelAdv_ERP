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
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   </head>
   <body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        
     
    
     
     <!-- product section -->
     @include('home.product_view')
     <!-- end product section -->
    </div>

     <!----  Comment section starts -->

     <div style="text-align:center; padding-bottom:30px;">
      <h1 style="font-size: 30px; text-align:center; padding-top:2opx;padding-bottom:20px">Comments</h1>
      <form action="{{url('add_comment')}}" method="POST">
         @csrf
         <textarea style="height:150px;width:600px;" name="comment"   placeholder="Write your comments">

         </textarea>
         <br>
        <input type="submit" class="btn btn-success" value="Comment">
      </form>
   </div>

   <div style="padding-left: 20%;">
      <h1 style="padding-bottom: 20px; font-size:20px;">All comments....</h1>
      
      <!--foreach loop for Comment-->
      @foreach($comment as $comm)
      <div>
         <b>{{$comm->name}}</b>
         <p>{{$comm->comment}}</p>
        
         <a style="color:blue" href="javascript::void(0)" onclick="reply(this)" data-Commentid="{{$comm->id}}">Reply</a>
        
         <!-- foreach loop for Reply  -->
         @foreach($reply as $message)
         <!-- if ID matches with comment and reply table with person
         will only show the person comments  -->
         @if($message->comment_id==$comm->id)
         <div style="padding-left: 3%; padding-top:10px; padding-bottom:10px">
             <b>{{$message->name}}</b>
             <p>{{$message->reply}}</p>
             <a style="color:blue" href="javascript::void(0)" onclick="reply(this)" data-Commentid="{{$comm->id}}">Reply</a>
         </div>
         @endif
        @endforeach
      </div>
      @endforeach

      <div style="display:none;" class="replyDiv">
      <form action="{{url('add_reply')}}" method="POST">
         @csrf
         <input type="text" id="commentId" name="commentId" hidden="">
         <textarea name="reply" id="" cols="50" rows="2" placeholder="Reply the comment"></textarea>
         <br>
         <button type="submit" class="btn btn-primary">Reply</button>
      </form>
         <a href="javascript::void(0)"  class="btn" onclick= "reply_close(this)">Close</a>
      </div>
   </div>




   <!--- Comments c]section ends --->



     <!-- subscribe section -->
     @include('home.subscribe')
     <!-- end subscribe section -->
     <!-- client section -->
     @include('home.client')
     <!-- end client section -->
     <!-- footer start -->
     @include('home.footer')
     <!-- footer end -->
     <div class="cpy_">
      <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
      
         Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
      
      </p>
   </div>
    
   <script type="text/javascript">
      function reply(caller) {
         document.getElementById('commentId').value=$(caller).attr('data-Commentid')         
          $('.replyDiv').insertAfter($(caller));
          
          $('.replyDiv').show();
      }

      function reply_close(caller) {
         
        
         
         $('.replyDiv').hide();
     }
      
  </script>
  
  <!-- Refresh Page and Keep Scroll Position  --->
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
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

     
   </body>
</html>