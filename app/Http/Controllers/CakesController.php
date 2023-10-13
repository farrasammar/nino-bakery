<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Cake;
 
class CakesController extends Controller
{
    public function index()
    {
        $cakes = Cake::all();
        return view('products', compact('cakes'));
    }
   
    public function cakeCart()
    {
        return view('cart');
    }
    public function addCaketoCart($id)
    {
        $cake = Cake::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $cake->name,
                "quantity" => 1,
                "price" => $cake->price,
                "image" => $cake->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cake has been added to cart!');
    }
     
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cake added to cart.');
        }
    }
   
    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Cake successfully deleted.');
        }
    }
}