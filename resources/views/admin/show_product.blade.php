<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

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

    @include('admin.script')
  </body>
</html>