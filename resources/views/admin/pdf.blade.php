<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order PDF</title>
</head>
<body>
    <h1>Order details</h1>

   Customer Name: <h3>{{$order->name}}</h3>
   Customer Email: <h3>{{$order->email}}</h3>
   Customer phone:<h3>{{$order->phone}}</h3>
   Customer address: <h3>{{$order->address}}</h3>
   Customer Id :<h3>{{$order->user_id}}</h3>
   Product Title: <h3>{{$order->prodct_title}}</h3>
   Product price: <h3>{{$order->price}}</h3>
   Product quantity:<h3>{{$order->quantity}}</h3>
   Customer payment:  <h3>{{$order->payment_status}}</h3>
   <br><br>
   Image : <img src="product/{{$order->image}}" style="width:100px; height:100px;">
</body>
</html>