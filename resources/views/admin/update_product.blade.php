<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
   
    <style>
        .div_center{
            text-align:center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color: black;
            padding-bottom: 10px;
        }
        label{
            display:inline-block;
            width:200px;
        }
        .div_design{
            padding-bottom: 50px;
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

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
            @endif

                <div class="div_center">
                    <h1 class="font_size">Edit Products</h1>
                    <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="div_design">
                        <label for="">Product Title</label>
                        <input class="text_color" type="text" name='title' required="" value="{{$product->title}}">
                    </div>
                    <div class="div_design">
                        <label for="">Product Description</label>
                        <input class="text_color" type="text" name='description' required="" value="{{$product->description}}">
                    </div>
                    <div class="div_design">
                        <label for="">Product Price</label>
                        <input class="text_color" type="number" name='price'  required="" value="{{$product->price}}">
                    </div>
                    <div class="div_design">
                        <label for="">Product Quantity</label>
                        <input class="text_color" type="number" name='quantity'  value="{{$product->quantity}}">
                    </div>
                    <div class="div_design">
                        <label for="">Discount Price</label>
                        <input class="text_color" type="number" name='dis_price' value="{{$product->discount_price}}">
                    </div>
                    <div class="div_design">
                        <label for="">Product Catagory</label>
                        <select class="text_color" name="catagory" id="" required="">
                            <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>
                           
                            @foreach ($catagory as $cate)
                            <option value="{{$cate->catagory_name}}">{{$cate->catagory_name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="div_design">
                        <label for="">Current image</label>
                        <img style="margin:auto;" height="100" width="100" src="/product/{{$product->image}}" alt="">
                    </div>
                    <div class="div_design">
                        <label for="">Upload image</label>
                        <input class="text_color" type="file" name='image' required="">
                    </div>
                    <div class="div_design">
                        
                        <input type="submit" name="Update product" class="btn btn-primary">
                    </div>
                </form>
                </div>
            </div>        
        </div> 
    
        @include('admin.script')
  </body>
</html>