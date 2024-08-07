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
      <title>Famms - Fashion Trends</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding:30px; border:1px solid black;">
            <div class="box">
               
               <div class="img-box" style="padding:20px;">
                  <img src="/product/{{$item->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                    {{$item->title}}
                  </h5>

                  @if($item->discount_price !=null)
                  <h6 style="color:red">
                    ${{$item->discount_price}}
                  </h6>
                  <h6 style="text-decoration: line-through; color:blue;">
                    ${{$item->price}}
                  </h6>
                  @else
                  <h6 style="color:blue;">
                    ${{$item->price}}
                  </h6>
                  @endif
                  
                  <h6>Catagory: {{$item->catagory}}</h6>
                  <h6>Description: {{$item->description}}</h6>
                  <h6>Quantity: {{$item->quantity}}</h6>
                  <a href="" class="btn btn-primary">Add to cart</a>
               </div>
            </div>
         </div>
       
     </div>
    
   
    <!--   footer end 
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>-->
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