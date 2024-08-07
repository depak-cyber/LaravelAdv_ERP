<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
      label{
        display:inline-block;
        width:150px;
        font-size:15px;
        font-weight:bold;
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

            <h1 style= "text-align:center; font-size:20px; font-weight:bold;">Send email to {{$order->email}}</h1>
        

        <form action="{{url('send_user_email', $order->id)}}" method="POST">
            @csrf
            <div style="text-align:center; padding-top:20px;">
                <label for="">Email Greeting</label>
                <input style="color:black;" type="text" name="greeting">
            </div>
            <div style="text-align:center; padding-top:20px;">
                <label for="">Email Title</label>
                <input style="color:black;" type="text" name="title">
            </div>
            <div style="text-align:center; padding-top:20px;">
                <label for="">Email Body</label>
                <input style="color:black;" type="text" name="body">
            </div>
            <div style="text-align:center; padding-top:20px;">
                <label for="">Email Button</label>
                <input style="color:black;" type="text" name="button">
            </div>
            <div style="text-align:center; padding-top:20px;">
                <label for="">Email URL</label>
                <input  style="color:black;" type="text" name="url">
            </div>
            <div style="text-align:center; padding-top:20px;">
                <label for="">Email Conclusion</label>
                <input  style="color:black;" type="text" name="conclusion">
            </div>
            <div style="text-align:center; padding-top:20px;">
                
                <input style= "text-align:center; font-weight:bold;" type="submit" name="Send Email" class="btn btn-primary">
            </div>
        </form>




        </div>
      </div>   
      
      @include('admin.script')
  </body>
</html>