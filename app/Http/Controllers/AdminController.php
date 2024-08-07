<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Notification;
use App\Notifications\MyFirstNotification;

class AdminController extends Controller
{
    public function view_catagory(){
        //if user login only
        if(Auth::id()){

            $data=Catagory::all();
        return view('admin.catagory', compact('data'));

        }else{
            return redirect('login');
        }
        
    }

    public function add_catagory(Request $request){
        if(Auth::id()){
            $data = new catagory;
        $data->catagory_name = $request->catagory;
        $data->save();

        return redirect()->back()->with('message', 'Catagory added successfully');
    }else {
        return redirect('login');

    }
        }
       

    public function delete_catagory($id){
        if(Auth::id()){
            $data=catagory::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Deleted successfully');
        }else{
            return redirect('login');
        }
        

    }

    public function view_product()
    {
        $catagory= catagory::all();

        return view('admin.product', compact('catagory'));
    }

    public function add_product(Request $request)
    {
        if(Auth::id()){
            $product=product::all();
        

            $product->title= $request->title;
            $product->description= $request->description;
            $product->price= $request->price;
            $product->quantity= $request->quantity;
            $product->discount_price= $request->dis_price;
            $product->catagory= $request->catagory;
   
            $image= $request->image;
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
   
           
            $product->save();
            
            return redirect()->back()->with('message', 'Added product successfully');
        }else{
            redirect('login');
        }
        
    }

    public function show_product(){
        $product = product::all();
        return view('admin.show_product', compact('product'));
    }
    public function delete_product($id){
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');


    }
    public function update_product($id){
        $product=product::find($id);
        $catagory = catagory::all();

        return view('admin.update_product', compact('product','catagory'));
    }

    public function update_product_confirm( Request $request, $id){
        if(Auth::id()){
            $product= product::find($id);

            $product->title=$request->title;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->quantity=$request->quantity;
            $product->discount_price=$request->dis_price;
            $product->catagory=$request->catagory;
            
            $image=$request->image;
            if($image){
              $imagename= time().'.'.$image->getClientOriginalExtension();
              $request->image->move('product', $imagename);
              $product->image=$imagename;
            }
            
            $product->save();
      
            return redirect()->back()->with('message', 'Product is updated successfully');
        }else{
            redirect('login');
        }
      


    }

    public function order(){
        $order = order::all();
        return view('admin.order', compact('order'));
    }

    public function delivered($id){
        $order = order::find($id);
        $order->delivery_satus= "Delivered";
        $order->payment_status = "Paid";
        $order->save();

        return redirect()->back();

    }

    public function print_pdf($id){
        $order= order::find($id);

        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
        //$pdf = PDF::loadView('admin.pdf', compact('order'));

    }
    public function send_email($id){
        $order = order::find($id);
        return view('admin.email_info', compact('order'));
    }
    public function send_user_email(Request $request, $id){
        $order = order::find($id);
        $details =
        [
          'greeting'=>$request->greeting,
          'title'=>$request->title,
          'body'=>$request->body,
          'button'=>$request->button,
          'url'=>$request->url,
          'conclusion'=>$request->conclusion

        ];
        Notification::send($order, new MyFirstNotification($details));
        return redirect()->back();
    }
    public function searchdata(Request $request){
        $searchTest = $request->search;

        $order = order::where('name', 'LIKE', "%$searchTest%")->orWhere('prodct_title', 'LIKE', "%$searchTest%")->get();

        return view('admin.order',compact('order'));

    }


}
