

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

      <style type="text/css">
      .center{
       margin-left:80px;
        width:80%;
        padding: 3px;
        text-align: center;
      }

      </style>
   </head>
   <body>
    
 
        @include('home.header')

        <div class="center">
            <h1><strong>ORDERS</strong></h1>
        </div>
        
        <div class="center">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Product Title</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Delivery Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
                @foreach($orders as $item)
                <tbody>
                <tr>
                    <td>{{ $item->prodct_title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->payment_status }}</td>
                    <td>{{ $item->delivery_satus }}</td>
                    <td><img src="product/{{$item->image}}" alt="Product Image" width="50"></td>
                    <td>
                        @if($item->delivery_satus=="Processing")
                        <a onclick="return confirm('Are you sure to cancel the order')"class= "btn btn-danger" href="{{url('/cancel_order', $item->id)}}">cancel</a>

                        @else
                        <p>Not Allowed</p>

                        @endif
                    </td>
                </tr>
            </tbody>
                @endforeach
            </table>
            
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