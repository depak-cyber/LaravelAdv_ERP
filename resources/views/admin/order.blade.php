<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Corona Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
<style>
    
   .table_deg{
    border:2px solid white;
    width:auto;
    margin:auto;
   

   } 
   .th_deg{
    background-color: skyblue
    
   }
    
</style>  
</head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              <h1 style="text-align:center; font-text:bold; padding:10px;"><strong>All orders</strong></h1>
              
              <div style="padding-left: 400px; padding-bottom: 30px;">
                <form action="{{url('search')}}" method="GET">
                  @csrf
                  <input type="text" style="color:black" name="search" placeholder="Search">
                  <input type="submit" value="Search" class="btn btn-outline-primary">
                </form>
              </div>
              
              <table class="table_deg">
                <tr class="th_deg">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Delivery</th>
                    <th>PDF</th>
                    <th>Send Email</th>
                </tr>
                @forelse($order as $order)
                <tr>
                  <td style="padding:10px;">{{$order->name}}</td>
                  <td style="padding:10px;">{{$order->email}}</td>
                  <td style="padding:10px;">{{$order->address}}</td>
                  <td style="padding:10px;">{{$order->phone}}</td>
                  <td style="padding:10px;">{{$order->prodct_title}}</td>
                  <td style="padding:10px;">{{$order->quantity}}</td>
                  <td style="padding:10px;">{{$order->price}}</td>
                  <td style="padding:10px;">{{$order->payment_status}}</td>
                  <td style="padding:10px;">{{$order->delivery_satus}}</td>
                  <td style="padding:10px;">
                    <img src="/product/{{$order->image}}" alt="" style="width:100px; height:100px">
                  </td>
                  <td style="padding:10px;">
                    @if($order->delivery_satus == 'Processing')
                    <a href="{{url('/delivered', $order->id)}}" onclick="return confirm('Are you sure is the product delivered?')" class="btn btn-danger">delivered</a>
                    @else
                     <p style="color:green"><strong>DELIVERED</strong></p>
                    @endif
                  </td>

                  <td style="padding:10px;">
                    <a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Print PDF</a>
                  </td>
                  <td style="padding:10px;">
                    <a href="{{url('send_email', $order->id)}}" class="btn btn-info">Email</a>
                  </td>
                </tr>

                @empty 
                <tr>
                  <td colspan="16">
                    No data found
                  </td>

                </tr>  
                    
               
                @endforelse
              </table>  






            </div>
        </div>         
      
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>