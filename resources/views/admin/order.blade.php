<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
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
        @include('admin.script')
  </body>
</html>