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

      <style>
        .center{
            margin:auto;
            width:50%;
            padding:30px;
            text-align:center;
            
           
        }
        table,th,td{
            border:1px solid grey;
            
        }
        .font_size{
            text-align:center;
            padding-top:20px;
            font-size: 20px;

        }
        .img_deg{
            margin:auto;
            width:100px;
            height:100px;
        }
        .th_color{
            background-color: skyblue;
        }
        .th_deg{
            padding:5px;
            font-size:20px;
            background:skyblue;
        }
        .total_deg{
            padding:10px 10px;
            font-size:20px;
        }
    </style>
   </head>
   <body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{session()->get('message')}}
        </div>
    @endif
   
   <div class="center">
    <table style="text-align: center; width:800px; height:100px;">
        <tr class="th_color">
            <th class="th_deg">Product title</th>
            
            <th class="th_deg">Quantity</th>
            
            <th class="th_deg">Price</th>
            <th class="th_deg">Image</th>
            <th class="th_deg">Action</th>
        </tr>
        <?php $totalprice = 0; ?>
        @foreach($cart as $item)
        <tr>
          <td>{{$item->product_title}}</td>
          <td>{{$item->quantity}}</td>
          
          <td>{{$item->price}}</td>
          
          <td>
            <img class="img_deg" src="/product/{{$item->image}}" alt="">
          </td>
          <td><a class=" btn btn-danger" onclick="return confirm('Are you sure?')" href="{{url('/remove_cart', $item->id)}}">Remove</a></td>
        </tr>

        <?php $totalprice = $totalprice + $item->price; ?>
        @endforeach
    </table>
    <div>
       <h6 class="total_deg"> Total Price:{{ $totalprice}}</h6>
    </div>
    <div>
        <h1 style="font-size:25px; padding-bottom: 15px;">Proceed to Order</h1>
        <a class="btn btn-danger" href="{{url('cash_order')}}">Pay By Cash</a>
        <a class="btn btn-danger" href="{{url('stripe', $totalprice)}}">Pay Using Card</a>
    </div>


    
</div>
   
       
    
     
     <!-- footer start -->
     @include('home.footer')
     <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
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