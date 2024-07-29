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
        .center{
            margin:auto;
            width:85%;
            border: 2px solid white;
            text-align:center;
            margin-top: 20px;
           
        }
        .font_size{
            text-align:center;
            padding-top:20px;
            font-size: 20px;

        }
        .img_size{
            margin:auto;
            width:100px;
            height:100px;
        }
        .th_color{
            background-color: skyblue;
        }
        .th_deg{
            padding:10px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
       
      <div class="main-panel">
        <div class="content-wrapper">

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
            </div>
        @endif
        <h2 class="font_size">Product details</h2>
        <table class="center">
            <tr class="th_color">
                <th class="th_deg">Product title</th>
                <th class="th_deg">Description</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Catagory</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Discount Price</th>
                <th class="th_deg">Product image</th>
                <th class="th_deg">Delete</th>
                <th class="th_deg">Edit</th>
            </tr>
            @foreach($product as $pro)
            <tr>
              <td>{{$pro->title}}</td>
              <td>{{$pro->description}}</td>
              <td>{{$pro->quantity}}</td>
              <td>{{$pro->catagory}}</td>
              <td>{{$pro->price}}</td>
              <td>{{$pro->discount_price}}</td>
              <td>
                <img class="img_size" src="/product/{{$pro->image}}" alt="">
              </td>
              <td>
                <a class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" href="{{url('/delete_product', $pro->id)}}">Delete</a>
              </td>
              <td>
                <a class="btn btn-success" href="{{url('update_product', $pro->id)}}">Edit</a>
              </td>
            </tr>
            @endforeach
        </table>

        </div>
    </div> 

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