<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;

use Session;
use Stripe;


class HomeController extends Controller
{
    public function index(){
        $product = product::paginate(3);
        $comment = Comment::orderby('id','desc')->get();
        $reply = Reply::all();

        return view('home.userpage', compact('product', 'comment', 'reply'));
    }

    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype== '1'){
            $total_products = product::all()->count();
            $total_orders = Order::all()->count();
            $total_users = user::all()->count();

            $order =Order::all();
            $total_revenue=0;
            foreach($order as $item)
            {
              $total_revenue= $total_revenue + $item->price;
            }

            $total_delivered = order::where('delivery_satus', '=', 'delivered')->get()->count();
            $total_processing = order::where('delivery_satus', '=', 'Processing')->get()->count();
            return view('admin.home', compact('total_products','total_orders','total_users', 'total_revenue', 'total_delivered', 'total_processing'));
        }else{
            $product = Product::paginate(10);
            $comment = Comment::orderby('id','desc')->get();
            $reply = Reply::all();

            return view('home.userpage', compact('product', 'comment', 'reply'));
        }
    }

    public function product_details($id){
        $item = product::find($id);
        return view('home.product_details', compact('item'));
    }
    public function add_cart( Request $request, $id){
        if(Auth::id()){
           $user = Auth::user();
          // dd($user);
          $userid = $user->id;
          $product = Product::find($id);

          //add to cart, check where product_id and user_id match 
          //then get cart id and fetch quantity and price
          $product_exist_id = cart::where('product_id', '=', $id)->where('user_id', '=',$userid)->get('id')->first();
           
          if($product_exist_id){

            $cart = cart::find($product_exist_id)->first();
            $quantity = $cart->quantity;
            $cart->quantity = $quantity + $request->quantity; 
            
            if ($product->discount_price !=null){
                $cart->price= $product->discount_price * $cart->quantity;
            }else{
              $cart->price = $product->price * $cart->quantity;
            }
          
            $cart->save();
            //sweet alert
            Alert::success('Product Added','Added Product To Cart');
            return redirect()->back();
            

          }else{

          $cart = new Cart();
          $cart->name = $user->name;
          $cart->email = $user->email;
          $cart->phone = $user->phone;
          $cart->address = $user->address;
          $cart->user_id = $user->id;
        
          $cart->product_title = $product->title;
          //logic for discount price
          if ($product->discount_price !=null){
              $cart->price= $product->discount_price * $request->quantity;
          }else{
            $cart->price = $product->price * $request->quantity;
          }

         
          $cart->image = $product->image;
          $cart->product_id = $product->id;

          $cart->quantity = $request->quantity;
          $cart->save();
          Alert::success('Product Added','Added Product To Cart');
          return redirect()->back();

          }
          

        }else{
            return redirect('login');
        }
        
    }
    public function show_cart(){
     //if user logged in condition
        if(Auth::id()){
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
    
            return view('home.showcart', compact('cart'));
        }
        else{
            return redirect('login');
        }
       

    }
    public function remove_cart($id){
        $cart=cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function cash_order(){
        $user= Auth::user();
        $userId = $user->id;

        $item = cart::where('user_id', '=', $userId)->get();
        //dd($data);

        foreach($item as $data){
            $order= new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->prodct_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'Pay By Cash';
            $order->delivery_satus = 'Processing';
            $order->save();

            //After sending data to orders table 
            //delete all data from same users in the fron and back

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();


        }
        return redirect()->back()->with('message', 'We have received your oder, we will proceed it soon!!!');
    }

    public function stripe($totalprice){

        return view('home.stripe', compact('totalprice'));

    }

    //Stripe

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment Successful" 
        ]);

        $user= Auth::user();
        $userId = $user->id;

        $item = cart::where('user_id', '=', $userId)->get();
        //dd($data);

        foreach($item as $data){
            $order= new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->prodct_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'Paid';
            $order->delivery_satus = 'Processing';
            $order->save();

            //After sending data to orders table 
            //delete all data from same users in the fron and back

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();


        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order() {
        // If the auth ID exists
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
    
            $orders = Order::where('user_id', '=', $userid)->get();
        return view('home.order', compact('orders'));
        } else {
            return redirect('login');
        }
    }

    public function cancel_order($id){
        $order = order::find($id);
        $order->delivery_satus= "Cancelled";
        $order->save();

        return redirect()->back();
    }

    public function add_comment(Request $request){
        if(Auth::id()){
            $comment = new comment;
            $comment->name= Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment= $request->comment;

            $comment->save();

            return redirect()->back();

        }else{
            return redirect('login');
        }

        
    }

    public function add_reply(Request $request){
        if(Auth::id()){
            $reply = new reply;

            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;
            $reply->save();

            return redirect()->back();



        }else{
            return redirect('login');
        }
    }
 

    public function product_search(Request $request){
        //just added comment and reply becoz it see in userpage and get error
        $comment = Comment::orderby('id','desc')->get();
        $reply = Reply::all();

        $search_text= $request->search;
       // $product = Product::where('title','LIKE',"%$search_text%")->get();
       $product = Product::where('title','LIKE',"%$search_text%")->orWhere('catagory', 'LIKE', "%$search_text%")->get();

        return view('home.userpage', compact('product', 'comment','reply'));



    }
    public function products(){
        $product = product::paginate(3);
        $comment = Comment::orderby('id','desc')->get();
        $reply = Reply::all();

        return view('home.all_product', compact('product','comment', 'reply'));
    }
    public function search_product(Request $request){
         //just added comment and reply becoz it see in userpage and get error
         $comment = Comment::orderby('id','desc')->get();
         $reply = Reply::all();
 
         $search_text= $request->search;
        // $product = Product::where('title','LIKE',"%$search_text%")->get();
        $product = Product::where('title','LIKE',"%$search_text%")->orWhere('catagory', 'LIKE', "%$search_text%")->get();
 
         return view('home.all_product', compact('product', 'comment','reply'));
 
    }
}
